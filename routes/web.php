<?php

use App\Http\Controllers\Api\CalificacionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


use App\Http\Controllers\Api\CuentaAlumnoController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\HorarioController;
use App\Http\Controllers\Api\CredencialDigitalController;
use App\Http\Controllers\Api\GrupoPreparacionController;


Route::prefix('api')->group(function () {
    Route::get('cuenta-alumnos', [CuentaAlumnoController::class, 'index']);
    Route::get('logins', [LoginController::class, 'index']);
    Route::get('calificaciones', [CalificacionController::class, 'index']);
    Route::get('horarios', [HorarioController::class, 'index']);
    Route::get('grupos-en-preparacion', [GrupoPreparacionController::class, 'index']);
    Route::get('credenciales-digitales', [CredencialDigitalController::class, 'index']);
});
