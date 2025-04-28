<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GrupoPreparacionController extends Controller
{
    public function index()
    {
        // Datos de grupos en preparación simulados (arreglo)
        $grupos_en_preparacion = [
            [
                'id' => 1,
                'materia' => 'Matemáticas',
                'numero_creditos' => 4,
                'maestro' => 'Dr. López',
                'horario' => 'Lunes 8:00 - 10:00',
            ],
            [
                'id' => 2,
                'materia' => 'Física',
                'numero_creditos' => 3,
                'maestro' => 'Ing. Pérez',
                'horario' => 'Miércoles 10:00 - 12:00',
            ],
        ];

        return response()->json($grupos_en_preparacion);
    }
}
