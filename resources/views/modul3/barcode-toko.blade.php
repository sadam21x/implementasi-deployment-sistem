<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>
        QR Code -
        @php
            echo $nama_toko;
        @endphp
    </title>

    <link rel="stylesheet" href="{{ asset('/assets/css/barcode-toko.css') }}">
</head>
<body>

    <div class="container">
        <img src="data:image/png;base64,{{ DNS2D::getBarcodePNG($id_toko, 'QRCODE') }}">
        <h6 class="nama-toko">{{ $nama_toko }}</h6>
    </div>

</body>
</html>
