<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get(
    'login/google',
    [\App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogle']
);

Route::get(
    'login/google/callback',
    [\App\Http\Controllers\Auth\LoginController::class, 'handleGoogleCallback']
);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
