@extends('layouts/modul1/main')
@section('title', 'Kunjungan Toko')
@section('extra-css')
    <link rel="stylesheet" href="{{ asset('/assets/datatable/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/barcode-scanner.css') }}">
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

            <div class="header-button-group mb-4">
                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-tambah-toko">
                    <i class="fas fa-plus-circle mr-2"></i>
                    Tambah Toko
                </button>
                <button class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#modal-submit-kunjungan">
                    <i class="fas fa-plus-circle mr-2"></i>
                    Submit Kunjungan
                </button>
            </div>

            <div class="judul-tabel">
                <h5>List Toko</h5>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-stack table-bordered datatable-table">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Nama Toko</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($toko as $toko1)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $toko1->nama_toko }}</td>
                                    <td colspan="2">
                                        <button class="btn btn-sm btn-linkedin" data-toggle="modal" data-target="#modal-detail-toko-{{ $toko1->barcode }}">
                                            <i class="fas fa-info-circle mr-2"></i>
                                            Detail
                                        </button>

                                        <form action="{{ url('/kunjungan-toko/cetak-barcode') }}" method="POST" class="d-inline">
                                            @csrf

                                            <input type="hidden" name="id_toko" value="{{ $toko1->barcode }}">

                                            <button type="submit" class="btn btn-sm btn-google">
                                                <i class="fas fa-print mr-2"></i>
                                                Cetak Barcode
                                            </button>
                                        </form>
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

{{-- Start Tambah Toko Modal --}}
<div class="modal fade" id="modal-tambah-toko" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title">Tambah Toko</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times-circle text-danger"></i>
                </button>
            </div>
            <div class="modal-body">

                <div class="container">

                    <form action="{{ url('/kunjungan-toko/tambah-toko') }}" method="post">
                        @csrf

                        <div class="mb-3">
                            <label>Nama Toko</label>
                            <input type="text" class="form-control" name="input_nama_toko">
                        </div>

                        <div class="my-3">
                            <label>Latitude</label>
                            <input type="text" value="" class="form-control" name="input_latitude" id="input_latitude">
                        </div>

                        <div class="my-3">
                            <label>Longitude</label>
                            <input type="text" value="" class="form-control" name="input_longitude" id="input_longitude">
                        </div>

                        <div class="my-3">
                            <label>Accuracy</label>
                            <input type="text" value="" class="form-control" name="input_accuracy" id="input_accuracy">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-dark btn-geolocation" onclick="getLocation()">
                                GEOLOCATION
                            </button>
                            <button type="submit" class="btn btn-sm btn-primary">
                                SUBMIT
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
{{-- End of Tambah Toko Modal --}}

{{-- Start Submit Kunjungan Modal --}}
<div class="modal fade" id="modal-submit-kunjungan" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title">Submit Kunjungan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times-circle text-danger"></i>
                </button>
            </div>
            <div class="modal-body">

                <div class="my-container">
                    <div class="video-container">
                        <video id="video"></video>
                    </div>
                    <div class="tombol-container">
                        <button id="startButton" class="btn btn-sm btn-dark">
                            <i class="fas fa-play-circle mr-2"></i>
                            START
                        </button>
                        <button id="resetButton" class="btn btn-sm btn-youtube">
                            <i class="fas fa-undo-alt mr-2"></i>
                            RESET
                        </button>
                    </div>
                    <div id="sourceSelectPanel" class="form-group">
                        <label class="d-flex justify-content-center">Pilih Kamera</label>
                        <select id="sourceSelect" class="form-control select-camera">
                        </select>
                    </div>
                    <h5>Hasil:</h5>
                    <div class="hasil-scan-container">
                        <p id="result"></p>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-dark btn-geolocation" onclick="getSalesLocation()">
                            GET MY LOCATION
                        </button>
                        <button type="submit" id="submit-kunjungan-btn" class="btn btn-sm btn-primary disabled">
                            SUBMIT
                        </button>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
{{-- End of Submit Kunjungan Modal --}}

{{-- Start Detail Toko Modal --}}
@foreach ($toko as $toko2)
<div class="modal fade" id="modal-detail-toko-{{ $toko2->barcode }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title">Detail Toko</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times-circle text-danger"></i>
                </button>
            </div>
            <div class="modal-body">

                <div class="container">

                    <div class="mb-4 barcode-container">
                        <img src="data:image/png;base64,{{ DNS2D::getBarcodePNG($toko2->barcode, 'QRCODE') }}">
                    </div>

                    <div class="my-3">
                        <label>Nama Toko:</label>
                        <h6>{{ $toko2->nama_toko }}</h6>
                    </div>

                    <div class="my-3">
                        <label>Latitude:</label>
                        <h6>{{ $toko2->latitude }}</h6>
                    </div>

                    <div class="my-3">
                        <label>Longitude:</label>
                        <h6>{{ $toko2->longitude }}</h6>
                    </div>

                    <div class="my-3">
                        <label>Accuracy:</label>
                        <h6>{{ $toko2->accuracy }}</h6>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
{{-- End of Detail Toko Modal --}}
@endforeach

@endsection

@section('extra-script')
    <script src="{{ asset('/assets/datatable/datatables.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert@2.1.2/dist/sweetalert.min.js" integrity="sha256-KsRuvuRtUVvobe66OFtOQfjP8WA2SzYsmm4VPfMnxms=" crossorigin="anonymous"></script>
    <script src="http://maps.googleapis.com/maps/api/js"></script>
    <script type="text/javascript" src="https://unpkg.com/@zxing/library@latest"></script>
    {{-- <script src="{{ asset('/assets/js/zxing.js') }}"></script> --}}
    <script src="{{ asset('/assets/js/kunjungan-toko.js') }}"></script>
@endsection