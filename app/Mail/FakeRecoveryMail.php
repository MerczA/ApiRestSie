<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FakeRecoveryMail extends Mailable
{
    use Queueable, SerializesModels;

    public function build()
    {
        return $this->subject('Recuperación de contraseña')
            ->view('emails.fake_recovery');
    }
}
