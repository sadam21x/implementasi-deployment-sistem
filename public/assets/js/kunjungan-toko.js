// Efek menu aktif
$('#kunjungan-toko-menu').addClass('active');

// Datatable
$('.datatable-table').DataTable();

var toko_latitude;
var toko_longitude;
var toko_accuracy;

var sales_latitude;
var sales_longitude;
var sales_accuracy;

// Function untuk mendapatkan posisi user/device
function getLocation () {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        alert('Browser yang anda gunakan tidak mendukung geolocation');
    }
}

// Function untuk memanipulasi form dengan data yang didapat dari function getLocation()
function showPosition (position) {
    var current_latitude = position.coords.latitude;
    var current_longitude = position.coords.longitude;
    var current_accuracy = position.coords.accuracy;

    console.log('Latitude: ' + current_latitude);
    console.log('Longitude: ' + current_longitude);
    console.log('Accuracy: ' + current_accuracy);

    $('#input_latitude').val(current_latitude);
    $('#input_longitude').val(current_longitude);
    $('#input_accuracy').val(current_accuracy);
}

// ====================== QRCode Scanner =========================
let selectedDeviceId;
const codeReader = new ZXing.BrowserMultiFormatReader()
console.log('ZXing code reader initialized')
codeReader.listVideoInputDevices()
    .then((videoInputDevices) => {
        const sourceSelect = document.getElementById('sourceSelect')
        selectedDeviceId = videoInputDevices[0].deviceId
        if (videoInputDevices.length >= 1) {
            videoInputDevices.forEach((element) => {
                const sourceOption = document.createElement('option')
                sourceOption.text = element.label
                sourceOption.value = element.deviceId
                sourceSelect.appendChild(sourceOption)
            })

            sourceSelect.onchange = () => {
                selectedDeviceId = sourceSelect.value;
            };

            const sourceSelectPanel = document.getElementById('sourceSelectPanel')
            sourceSelectPanel.style.display = 'block'
        }

        document.getElementById('startButton').addEventListener('click', () => {
            codeReader.decodeFromVideoDevice(selectedDeviceId, 'video', (result, err) => {
                if (result) {

                    var id_toko = result.text;
                    var token = $('meta[name="csrf-token"]').attr('content');
                    var url = '/req-data-toko';

                    $.ajax({
                        type: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': token
                        },
                        url: url,
                        data: {id : id_toko},
                        dataType: 'json',
                        success: function(data){

                            toko_latitude = data[0].latitude;
                            toko_longitude = data[0].longitude;
                            toko_accuracy = data[0].accuracy;

                            var hasil = '<div class="my-3 d-flex justify-content-center">Detail Toko</div>' +
                                        'Nama Toko: ' + data[0].nama_toko + '<br>' +
                                        'Latitude: ' + data[0].latitude + '<br>' +
                                        'Longitude: ' + data[0].longitude + '<br>' +
                                        'Accuracy: ' + data[0].accuracy + '<br>';

                            $('#result').html(hasil);
                        }
                    });

                }
                if (err && !(err instanceof ZXing.NotFoundException)) {
                    console.error(err)
                    document.getElementById('result').textContent = err
                }
            })
            console.log(`Started continous decode from camera with id ${selectedDeviceId}`)
        })

        document.getElementById('resetButton').addEventListener('click', () => {
            codeReader.reset()
            document.getElementById('result').textContent = '';
            $('#submit-kunjungan-btn').addClass('disabled');
        })

    })
    .catch((err) => {
        console.error(err)
    })

//  ====================== Lokasi Sales =================================

function getSalesLocation () {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showSalesPosition);
    } else {
        alert('Browser yang anda gunakan tidak mendukung geolocation');
    }
}

function showSalesPosition (position) {
    sales_latitude = position.coords.latitude;
    sales_longitude = position.coords.longitude;
    sales_accuracy = position.coords.accuracy;

    var hasil = '<div class="my-3 d-flex justify-content-center">Lokasi Anda</div>' +
                    'Latitude: ' + sales_latitude + '<br>' +
                    'Longitude: ' + sales_longitude + '<br>' +
                    'Accuracy: ' + sales_accuracy + '<br>';

    $('#result').append(hasil);

    var distance = hitungJarakSalesDanToko();
    var jumlahAcc = sales_accuracy+toko_accuracy;
    var rataAcc = jumlahAcc/2;

    konfirmasiKunjungan(rataAcc, distance);
}

// ================== Hitung jarak sales dan toko =======================

function hitungJarakSalesDanToko () {

    var R = 6371000; // Radius of the earth in m
    var dLat = deg2rad(sales_latitude - toko_latitude);
    var dLon = deg2rad(sales_longitude - toko_longitude);

    var a =
            Math.sin(dLat/2) * Math.sin(dLat/2) +
            Math.cos(deg2rad(toko_latitude)) * Math.cos(deg2rad(sales_latitude)) *
            Math.sin(dLon/2) * Math.sin(dLon/2)
        ;
    
    var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
    var d = R * c; // Distance in m

    $('#result').append(d);

    return d;

}

function deg2rad(deg) {
    return deg * (Math.PI/180);
}   

//  ================ Hasil kunjungan =====================
function konfirmasiKunjungan(rataAcc, distance){

    if (distance <= rataAcc) {
        var hasil = '<div class="my-3 d-flex justify-content-center">Hasil Kunjungan</div>' +
                    'Kunjungan Diterima.' + '<br>';
        
        $('#result').append(hasil);

        swal({
            title: "Kunjungan diterima!",
            icon: "success"
        });

        $('#submit-kunjungan-btn').removeClass('disabled');
    } else {
        var hasil = '<div class="my-3 d-flex justify-content-center">Hasil Kunjungan</div>' +
                    'Kunjungan Ditolak, Anda tidak berada dalam toko.' + '<br>';
        
        $('#result').append(hasil);

        swal({
            title: "Kunjungan ditolak!",
            text: "Anda tidak berada dalam toko",
            icon: "error"
        });
    }

}