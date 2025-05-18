<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\FakeRecoveryMail;

class EmailController extends Controller
{
    public function sendFakeRecoveryEmail(Request $request): \Illuminate\Http\JsonResponse
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        Mail::to($request->email)->send(new FakeRecoveryMail());

        return response()->json(['message' => 'Correo de recuperación enviado.']);
    }
}
