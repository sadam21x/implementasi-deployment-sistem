@extends('layouts/modul1/main')
@section('title', 'Import from Excel')
@section('extra-css')
    <link rel="stylesheet" href="{{ asset('/assets/css/customer.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/customer-excel.css') }}">
@endsection

@section('content')
<!-- Content -->
<div class="content ">

    <div class="page-header">
        <h4>Customer</h4>
        <hr>
    </div>

    <div class="row">
        <div class="col-md-12">

            <div class="judul-tabel mb-3">
                <h5>Import from Excel</h5>
            </div>

            <form action="{{ url('/customer/excel') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="file-upload-container">
                    <h6 class="text-center">Upload your excel (xls or xlsx) file</h6>
                    <h1 class="text-primary"><i class="fas fa-cloud-upload-alt"></i></h1>

                    <input type="file" name="file_excel" accept=".xls,.xlsx" class="ml-5 mt-3">

                    <button type="submit" class="btn btn-sm btn-dark mt-5">
                        SAVE
                    </button>
                </div>
            </form>

        </div>
    </div>

</div>
<!-- ./ Content -->
@endsection

@section('extra-script')
    <script src="{{ asset('/assets/js/customer-excel.js') }}"></script>
@endsection