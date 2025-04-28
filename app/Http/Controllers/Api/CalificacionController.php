<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CalificacionController extends Controller
{
    public function index()
    {
        // Datos de calificaciones simuladas (arreglo)
        $calificaciones = [
            [
                'id' => 1,
                'nombre' => 'Matemáticas',
                'numero_creditos' => 4,
                'unidad1' => 90,
                'unidad2' => 85,
                'unidad3' => 80,
                'unidad4' => 95,
                'unidad5' => 88,
                'unidad6' => 92,
            ],
            [
                'id' => 2,
                'nombre' => 'Física',
                'numero_creditos' => 3,
                'unidad1' => 75,
                'unidad2' => 80,
                'unidad3' => 70,
                'unidad4' => 78,
                'unidad5' => 85,
                'unidad6' => 80,
            ],
        ];

        return response()->json($calificaciones);
    }
}
