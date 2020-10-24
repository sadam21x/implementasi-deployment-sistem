@extends('layouts/modul1/main')
@section('title', 'Kunjungan Toko')
@section('extra-css')
    <link rel="stylesheet" href="{{ asset('/assets/datatable/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/kunjungan-toko.css') }}">
@endsection

@section('content')
<!-- Content -->
<div class="content ">

    <div class="page-header">
        <h4>Kunjungan Toko</h4>
        <hr>
    </div>

    <div class="row">
        <div class="col-md-12">

            <div class="judul-tabel">
                <h5>Kunjungan Toko</h5>
            </div>


        </div>
    </div>

</div>
<!-- ./ Content -->
@endsection

@section('extra-script')
    <script src="{{ asset('/assets/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('/assets/js/kunjungan-toko.js') }}"></script>
@endsection