<?php

use Illuminate\Support\Facades\Route;

Route::get('/barang', 'modul4\BarangController@index');
Route::get('/barang/{id}', 'modul4\BarangController@show');
Route::post('/barang', 'modul4\BarangController@insert_barang');
Route::put('/barang', 'modul4\BarangController@update_barang');
Route::delete('/barang', 'modul4\BarangController@delete_barang');