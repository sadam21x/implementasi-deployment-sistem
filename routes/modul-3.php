<?php

use Illuminate\Support\Facades\Route;

Route::get('/kunjungan-toko', 'modul3\KunjunganTokoController@index');
Route::post('/kunjungan-toko/tambah-toko', 'modul3\KunjunganTokoController@tambah_toko');