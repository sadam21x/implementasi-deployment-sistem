<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/', '/customer');
// Route::view('/login-backup', 'auth.login-backup');
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/auth/google', 'Auth\GoogleController@redirectToGoogle');
Route::get('/auth/google/callback', 'Auth\GoogleController@handleGoogleCallback');