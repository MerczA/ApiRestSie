<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function index()
    {
        $logins = [
            [
                'id' => 1,
                'username' => 'juanperez',
                'email' => 'juanperez@example.com',
                'password' => 'password123',
            ],
            [
                'id' => 2,
                'username' => 'anagonzalez',
                'email' => 'anagonzalez@example.com',
                'password' => 'password456',
            ],
        ];

        return response()->json($logins);
    }

    public function login(Request $request)
    {
        $logins = [
            [
                'id' => 1,
                'username' => 'juanperez',
                'email' => 'juanperez@example.com',
                'password' => 'password123',
            ],
            [
                'id' => 2,
                'username' => 'anagonzalez',
                'email' => 'anagonzalez@example.com',
                'password' => 'password456',
            ],
        ];

        foreach ($logins as $user) {
            if (
                $request->username === $user['username'] &&
                $request->password === $user['password']
            ) {
                return response()->json([
                    'login' => 'success',
                    'user' => [
                        'id' => $user['id'],
                        'username' => $user['username'],
                        'email' => $user['email'],
                    ]
                ]);
            }
        }

        return response()->json([
            'login' => 'failed',
            'message' => 'Credenciales inválidas'
        ], 401);
    }
}
