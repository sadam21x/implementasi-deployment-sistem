<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/', '/customer');
Auth::routes();

Route::get('/auth/google', 'Auth\GoogleController@redirectToGoogle');
Route::get('/auth/google/callback', 'Auth\GoogleController@handleGoogleCallback');
Route::get('/user-manual', 'HomeController@user_manual');