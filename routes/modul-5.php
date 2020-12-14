<?php

use Illuminate\Support\Facades\Route;

Route::get('/customer/excel', 'modul5\CustomerController@index');
Route::post('/customer/excel', 'modul5\CustomerController@store');