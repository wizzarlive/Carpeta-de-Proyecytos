<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProyectoController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

/* 
RUTA PRINCIPAL
*/
Route::get('/', function () {
    if (Auth::check()) return redirect('/proyectos');

    return response(view('auth.login'))
        ->header('Cache-Control', 'no-cache, no-store, must-revalidate')
        ->header('Pragma', 'no-cache')
        ->header('Expires', '0');
});

/* 
RUTA LOGIN Y REGISTER
*/
Auth::routes();

/* 
RUTA LOGIN CON GOOGLE
*/
Route::get('login/google', [\App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogle']);
Route::get('login/google/callback', [\App\Http\Controllers\Auth\LoginController::class, 'handleGoogleCallback']);

/* 
RUTA LOGIN CON GITHUB
*/
Route::get('login/github', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGithub']);
Route::get('login/github/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleGithubCallback']);


/*
RUTAS PROTEGIDAS
*/
// Página de proyectos (protegida)
Route::middleware(['auth'])->get('/proyectos', [ProyectoController::class, 'index'])->name('proyectos');
Route::middleware(['auth'])->delete('/proyectos/{id}', [ProyectoController::class, 'destroy'])->name('proyectos.destroy');


// Página de CRUD categorias "etiquetas" (protegida)
Route::middleware(['auth'])->get('/create_etiqueta', [CategoriaController::class,'index'])->name('categorias.index');
Route::middleware(['auth'])->post('/create_etiqueta', [CategoriaController::class,'store'])->name('categorias.store');


// Página de formulario de agregar proyectos (protegida)
Route::middleware(['auth'])->get('/create_proyecto', [ProyectoController::class,'indexcreate'])->name('create_proyectos');
Route::middleware(['auth'])->post('/create_proyecto', [ProyectoController::class, 'store'])->name('create_proyectos.store');


// Página para editar proyectos
Route::middleware(['auth'])->get('/edit_proyectos/{id}', [ProyectoController::class, 'indexedit'])->name('edit_proyectos');
Route::middleware(['auth'])->put('/proyectos/{id}', [ProyectoController::class, 'update'])->name('proyectos.update');
