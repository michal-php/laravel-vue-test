<?php

use Illuminate\Support\Facades\Route;

//Auth::routes();

Route::post('login', 'Auth\LoginController@login');

Route::post('logout', 'Auth\LoginController@logout');

Route::get('/', function () {
    return view('home');
});

