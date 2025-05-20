<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GrupoPreparacionController extends Controller
{
    public function index()
    {
        $grupos_en_preparacion = [];

        $materias = [
            'Matemáticas', 'Física', 'Química', 'Programación', 'Historia', 'Literatura', 'Biología',
            'Álgebra', 'Geometría', 'Inglés', 'Contabilidad', 'Administración', 'Ética',
            'Economía', 'Psicología', 'Estadística', 'Cálculo', 'Inteligencia Artificial',
            'Bases de Datos', 'Redes', 'Sistemas Operativos', 'Desarrollo Web', 'Seguridad Informática',
            'Ingeniería de Software', 'Análisis de Algoritmos'
        ];

        $maestros = ['Dr. López', 'Ing. Pérez', 'Mtra. Sánchez', 'Lic. Gómez', 'Dra. Ortega', 'Prof. Ramírez'];

        $horarios = [
            'Lunes 8:00 - 10:00', 'Martes 10:00 - 12:00', 'Miércoles 12:00 - 14:00',
            'Jueves 14:00 - 16:00', 'Viernes 16:00 - 18:00', 'Sábado 9:00 - 11:00'
        ];

        for ($i = 1; $i <= 100; $i++) {
            $grupos_en_preparacion[] = [
                'id' => $i,
                'materia' => $materias[array_rand($materias)],
                'numero_creditos' => rand(2, 5),
                'semestre' => (string)rand(1, 9),
                'maestro' => $maestros[array_rand($maestros)],
                'horario' => $horarios[array_rand($horarios)],
            ];
        }

        return response()->json($grupos_en_preparacion);
    }
}

