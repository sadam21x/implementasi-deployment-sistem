@extends('layouts/modul1/main')
@section('title', 'Cetak Label TnJ 108')
@section('extra-css')
    <link rel="stylesheet" href="{{ asset('/assets/datatable/datatables.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('/assets/css/barang.css') }}">
@endsection

@section('content')
<!-- Content -->
<div class="content ">

    <div class="page-header">
        <h4>Cetak Label TnJ 108</h4>
        <hr>
    </div>

    <div class="row">
        <div class="col-md-12">

            <div class="judul-tabel">
                <h5>Daftar Barang</h5>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive-stack datatable-table">
                            <thead class="thead-dark">
                                <th scope="col">ID Barang</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Aksi</th>
                            </thead>
                            <tbody>
                                @foreach ($barang as $barang)
                                    <tr>
                                        <td>{{ $barang->id_barang }}</td>
                                        <td>{{ $barang->nama }}</td>
                                        <td>
                                            {{-- <form action="{{ url('/cetak-label-tnj-108') }}" method="post">
                                                @csrf
                                                
                                                <input type="hidden" name="input_id_barang" value="{{ $barang->id_barang }}">
                                                <button type="submit" class="btn btn-sm btn-youtube">
                                                    <i class="fas fa-file-pdf mr-2"></i>
                                                    CETAK BARCODE
                                                </button>
                                            </form> --}}

                                            <button type="button" class="btn btn-sm btn-youtube" data-toggle="modal" data-target="#modal-konfirmasi-cetak-{{ $barang->id_barang }}">
                                                <i class="fas fa-file-pdf mr-2"></i>
                                                CETAK BARCODE
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
<!-- ./ Content -->

{{-- Start Konfirmasi Cetak Barcode Modal --}}
@foreach ($barang2 as $barang2)
<div class="modal fade" id="modal-konfirmasi-cetak-{{ $barang2->id_barang }}" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title">Konfirmasi Cetak Barcode</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times-circle text-danger"></i>
                </button>
            </div>
            <div class="modal-body">

                <div class="container">

                    <form action="{{ url('/cetak-label-tnj-108') }}" method="post">
                        @csrf

                        <input type="hidden" name="id_barang" value="{{ $barang2->id_barang }}">
                        
                        <div class="my-b form-group">
                            <label>Nama Barang: </label>
                            <h6>{{ $barang2->nama }}</h6>
                        </div>

                        <div class="my-3 form-group">
                            <label>Jumlah Halaman</label>
                            <input type="number" name="jumlah_halaman" min="1" class="form-control num-without-style">
                        </div>
                        
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-sm btn-youtube">
                                <i class="fas fa-file-pdf mr-2"></i>
                                CETAK BARCODE
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
{{-- End Konfirmasi Cetak Barcode Modal --}}
@endforeach

@endsection

@section('extra-script')
    <script src="{{ asset('/assets/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('/assets/datatable/button.min.js') }}"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script>
    <script src="{{ asset('/assets/js/barang.js') }}"></script>
@endsection