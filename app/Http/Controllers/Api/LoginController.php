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
                'password' => 'password123',
            ],
            [
                'id' => 2,
                'username' => 'anagonzalez',
                'password' => 'password456',
            ],
        ];

        return response()->json($logins);
    }

    public function login(Request $request)
    {
        $logins = [
            ['id' => 1, 'username' => 'juanperez', 'password' => 'password123'],
            ['id' => 2, 'username' => 'anagonzalez', 'password' => 'password456'],
        ];

        foreach ($logins as $user) {
            if (
                $request->username === $user['username'] &&
                $request->password === $user['password']
            ) {
                return response()->json([
                    'message' => 'Login exitoso',
                    'user' => $user
                ]);
            }
        }

        return response()->json(['message' => 'success'], 401);
    }
}
