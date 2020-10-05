<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/', '/modul-1/customer');
Route::redirect('/modul-1', '/modul-1/customer');

// Modul 1
Route::get('/modul-1/customer', 'modul1\CustomerController@index');
Route::get('/modul-1/customer/tambah-1', 'modul1\CustomerController@tambah_customer1');
Route::get('/modul-1/customer/tambah-2', 'modul1\CustomerController@tambah_customer2');

Route::post('/customer/req-data-kota', 'modul1\CustomerController@req_data_kota');
Route::post('/customer/req-data-kecamatan', 'modul1\CustomerController@req_data_kecamatan');
Route::post('/customer/req-data-kelurahan', 'modul1\CustomerController@req_data_kelurahan');

Route::post('/modul-1/customer/tambah-1', 'modul1\CustomerController@store_customer1');
Route::post('/modul-1/customer/tambah-2', 'modul1\CustomerController@store_customer2');