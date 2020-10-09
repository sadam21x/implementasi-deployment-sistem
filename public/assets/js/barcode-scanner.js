// Efek menu aktif
$('#barcode-scanner-menu').addClass('active');

// Barcode scanner
const codeReader = new ZXing.BrowserQRCodeReader();

codeReader
  .decodeOnceFromVideoDevice(undefined, 'video')
  .then(result => function(result){
      var hasil = result.text;
      console.log(hasil);
      $('.hasil-scan').html(hasil);
  })
  .catch(err => console.error(err));