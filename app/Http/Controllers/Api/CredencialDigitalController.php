<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CredencialDigitalController extends Controller
{
    public function index()
    {
        // Datos de credenciales digitales simulados (arreglo)
        $credenciales_digitales = [
            [
                'id' => 1,
                'nombre' => 'Juan Pérez',
                'carrera' => 'Ingeniería',
                'n_control' => '1234567890',
                'qr_imagen' => 'url_qr_juan.jpg',
                'nss' => '123456789012345',
                'tipo_usuario' => 'Alumno',
            ],
            [
                'id' => 2,
                'nombre' => 'Ana González',
                'carrera' => 'Medicina',
                'n_control' => '9876543210',
                'qr_imagen' => 'url_qr_ana.jpg',
                'nss' => '987654321098765',
                'tipo_usuario' => 'Alumno',
            ],
        ];

        return response()->json($credenciales_digitales);
    }
}
