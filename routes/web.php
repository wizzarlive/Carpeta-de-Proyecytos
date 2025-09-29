<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/proyectos', function () {
    return view('proyectos');
});

Route::get('/create_etiqueta', function () {
    return view('create_etiqueta');
});

