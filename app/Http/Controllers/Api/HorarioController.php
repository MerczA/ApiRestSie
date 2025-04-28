<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HorarioController extends Controller
{
    public function index()
    {
        // Datos de horario simulados (arreglo)
        $horarios = [
            [
                'id' => 1,
                'materia' => 'Matemáticas',
                'creditos' => 4,
                'semestre' => 3,
                'docente' => 'Dr. López',
                'horario' => 'Lunes 8:00 - 10:00',
            ],
            [
                'id' => 2,
                'materia' => 'Física',
                'creditos' => 3,
                'semestre' => 4,
                'docente' => 'Ing. Pérez',
                'horario' => 'Miércoles 10:00 - 12:00',
            ],
        ];

        return response()->json($horarios);
    }
}
