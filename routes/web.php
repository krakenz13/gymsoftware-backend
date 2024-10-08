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
Route::get('estudiantes/search/{search}', [App\Http\Controllers\Estudiantes\ConsultaListadoEstudiantesController::class, 'index']);
Route::get('estudiantes/search', [App\Http\Controllers\Estudiantes\ConsultaListadoEstudiantesController::class, 'index']);
Route::post('estudiantes', [App\Http\Controllers\Estudiantes\CrearEstudianteController::class, 'store']);
Route::put('estudiantes/{id}', [App\Http\Controllers\Estudiantes\ActualizarEstudianteController::class, 'update']);
Route::delete('estudiantes/{id}', [App\Http\Controllers\Estudiantes\EliminarEstudianteController::class, 'destroy']);
Route::post('/subscriptions', [App\Http\Controllers\EstudiantesMentorias\SubscriptionController::class, 'store']);
Route::get('/subscriptions', [App\Http\Controllers\EstudiantesMentorias\SubscriptionController::class, 'index']);


