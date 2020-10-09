@extends('layouts/modul1/main')
@section('title', 'Barcode Scanner')
@section('extra-css')
    <link rel="stylesheet" href="{{ asset('/assets/css/barcode-scanner.css') }}">
@endsection

@section('content')
<!-- Content -->
<div class="content ">

    <div class="page-header">
        <h4>Barcode Scanner</h4>
        <hr>
    </div>

    <div class="row">
        <div class="col-md-12">

            <div class="my-container">
                <div class="video-container">
                    <video id="video"></video>
                </div>
                <h5>Hasil scan:</h5>
                <div class="hasil-scan-container">
                    <p class="hasil-scan"></p>
                </div>
            </div>

        </div>
    </div>

</div>
<!-- ./ Content -->
@endsection

@section('extra-script')
    <script src="https://unpkg.com/@zxing/library@latest"></script>
    <script src="{{ asset('/assets/js/barcode-scanner.js') }}"></script>
@endsection