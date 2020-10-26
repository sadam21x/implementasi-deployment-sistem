// Efek menu aktif
$('#kunjungan-toko-menu').addClass('active');

// Datatable
$('.datatable-table').DataTable();

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
                    console.log(result)
                    var hasil = "Hasil scan: "
                    hasil = hasil.concat(result.text)
                    document.getElementById('result').textContent = result.text
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
            console.log('Reset.')
        })

    })
    .catch((err) => {
        console.error(err)
    })