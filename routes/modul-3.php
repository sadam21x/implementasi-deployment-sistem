<?php

use Illuminate\Support\Facades\Route;

Route::get('/kunjungan-toko', 'modul3\KunjunganTokoController@index');
Route::post('/kunjungan-toko/cetak-barcode', 'modul3\KunjunganTokoController@cetak_barcode');
Route::post('/kunjungan-toko/tambah-toko', 'modul3\KunjunganTokoController@tambah_toko');
Route::post('/req-data-toko', 'modul3\KunjunganTokoController@req_data_toko');