<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get(
    'login/google',
    [\App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogle']
);

Route::get(
    'login/google/callback',
    [\App\Http\Controllers\Auth\LoginController::class, 'handleGoogleCallback']
);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
