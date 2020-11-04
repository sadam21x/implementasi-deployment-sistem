<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>
        Barcode -
        @php
            echo $nama_barang;
        @endphp
    </title>

    <link rel="stylesheet" href="{{ asset('/assets/css/label-tnj-108-new.css') }}">
</head>
<body>

    @for ($x = 1; $x <= $jumlah_halaman; $x++)
        @for ($i = 1; $i <= 13; $i++)
            @for ($j = 1; $j <= 5; $j++)
                <div class="container">
                    <img src="data:image/png;base64,{{ DNS1D::getBarcodePNG($id_barang, 'C128',1.5,40,array(1,1,1), true) }}">
                    <h6 class="nama-barang">{{ $nama_barang }}</h6>
                </div>
            @endfor
            <div style="clear: both;"></div>
        @endfor
        <div style="clear: both;"></div>
    @endfor

</body>
</html>
