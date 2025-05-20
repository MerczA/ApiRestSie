<?php

use App\Mail\FakeRecoveryMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/test-email', function () {
    Mail::to('test@example.com')->send(new FakeRecoveryMail());
    return 'Correo enviado correctamente';
});





