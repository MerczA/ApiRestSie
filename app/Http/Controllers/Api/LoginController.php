<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function index()
    {
        // Datos de login simulados (arreglo)
        $logins = [
            [
                'id' => 1,
                'username' => 'juanperez',
                'password' => 'password123',
            ],
            [
                'id' => 2,
                'username' => 'anagonzalez',
                'password' => 'password456',
            ],
        ];

        return response()->json($logins . "Login Succes");
    }
}
