<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('estudiantes/search/{search}', [App\Http\Controllers\Estudiantes\ConsultaListadoEstudiantesController::class, 'index'])->name('listar_estudiantes');
Route::get('estudiantes/search', [App\Http\Controllers\Estudiantes\ConsultaListadoEstudiantesController::class, 'index'])->name('listar_estudiantes');
