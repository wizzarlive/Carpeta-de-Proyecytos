<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    if (Auth::check()) return redirect('/proyectos');

    return response(view('auth.login'))
        ->header('Cache-Control', 'no-cache, no-store, must-revalidate')
        ->header('Pragma', 'no-cache')
        ->header('Expires', '0');
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


// Página de proyectos (protegida)
Route::middleware(['auth'])->get('/proyectos', function () {
    return view('proyectos');
});

// Crear etiqueta (protegida)
Route::middleware(['auth'])->get('/create_etiqueta', function () {
    return view('create_etiqueta');
});

// Crear proyecto (protegida)
Route::middleware(['auth'])->get('/create_proyecto', function () {
    return view('create_proyectos');
});
