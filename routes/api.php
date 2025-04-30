<?php



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\CuentaAlumnoController;
use App\Http\Controllers\Api\CalificacionController;
use App\Http\Controllers\Api\HorarioController;
use App\Http\Controllers\Api\GrupoPreparacionController;
use App\Http\Controllers\Api\CredencialDigitalController;

Route::get('logins', [LoginController::class, 'index']);
Route::post('login', [LoginController::class, 'login']);
Route::get('cuenta-alumnos', [CuentaAlumnoController::class, 'index']);
Route::get('calificaciones', [CalificacionController::class, 'index']);
Route::get('horarios', [HorarioController::class, 'index']);
Route::get('grupos-en-preparacion', [GrupoPreparacionController::class, 'index']);
Route::get('credenciales-digitales', [CredencialDigitalController::class, 'index']);
