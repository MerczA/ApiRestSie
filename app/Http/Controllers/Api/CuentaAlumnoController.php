<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CuentaAlumnoController extends Controller
{
    public function index()
    {
        // Datos de alumnos (simulados con arreglo)
        $cuentas_alumnos = [
            [
                'id' => 1,
                'nombre_completo' => 'Juan Pérez',
                'carrera' => 'Ingeniería',
                'semestre' => 3,
                'numero_control' => '1234567890',
                'imagen' => 'url_imagen_juan_perez.jpg',
            ],
            [
                'id' => 2,
                'nombre_completo' => 'Ana González',
                'carrera' => 'Medicina',
                'semestre' => 5,
                'numero_control' => '9876543210',
                'imagen' => 'url_imagen_ana_gonzalez.jpg',
            ],
        ];

        return response()->json($cuentas_alumnos);
    }
}
