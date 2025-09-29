<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('login/google', [\App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogle']);
Route::get('login/google/callback', [\App\Http\Controllers\Auth\LoginController::class, 'handleGoogleCallback']);

Route::get('login/github', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGithub']);
Route::get('login/github/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleGithubCallback']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/proyectos', function () {
    return view('proyectos');
});

Route::get('/create_etiqueta', function () {
    return view('create_etiqueta');
});

Route::get('/create_proyecto', function () {
    return view('create_proyectos');
});


