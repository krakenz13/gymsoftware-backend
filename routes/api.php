<?php
// ESTUDIANTES
use App\Http\Controllers\Estudiantes\ActualizarEstudianteController;
use App\Http\Controllers\Estudiantes\ConsultaEstudianteController;
use App\Http\Controllers\Estudiantes\ConsultaListadoEstudiantesController;
use App\Http\Controllers\Estudiantes\CrearEstudianteController;
use App\Http\Controllers\Estudiantes\EliminarEstudianteController;

// ESTUDIANTES MENTORIAS

use App\Http\Controllers\EstudiantesMentorias\ConsultaEstudianteMentoriaController;
use App\Http\Controllers\EstudiantesMentorias\ConsultaListadoEstudianteMentoriasController;
use App\Http\Controllers\EstudiantesMentorias\CrearEstudianteMentoriaController;
use App\Http\Controllers\EstudiantesMentorias\EliminarEstudianteMentoriaController;

// MENTORIAS
use App\Http\Controllers\Mentorias\ConsultaListadoMentoriasController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
    Route::get('estudiantes/search', [ConsultaListadoEstudiantesController::class, 'index']);
        Route::get('estudiantes/search/{search}', [ConsultaListadoEstudiantesController::class, 'index']);
        Route::get('estudiantes/{id}', [ConsultaEstudianteController::class, 'show']);
        Route::post('estudiantes', [CrearEstudianteController::class, 'store']);
        Route::put('estudiantes/{id}', [ActualizarEstudianteController::class, 'update']);
        Route::delete('estudiantes/{id}', [EliminarEstudianteController::class, 'destroy']);

        //Mentorias
        Route::get('mentorias', [ConsultaListadoMentoriasController::class, 'index']);

        //Estudiantes Mentorias
        Route::get('estudiantes/{estudiante}/mentorias/{mentoria}', [ConsultaEstudianteMentoriaController::class, 'show']);
        Route::get('estudiantes/{estudiante}/listado/mentorias', [ConsultaListadoEstudianteMentoriasController::class, 'index']);
        Route::post('estudiantes/{estudiante}/mentorias', [CrearEstudianteMentoriaController::class, 'store']);
        Route::delete('estudiantes/{estudiante}/mentorias/{mentoria}', [EliminarEstudianteMentoriaController::class, 'destroy']);
});
