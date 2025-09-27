<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerifyEmailMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $token;

    public function __construct($user)
    {
        $this->user = $user;
        $this->token = base64_encode($user->id);
    }

    public function build()
    {
        return $this->subject('Verifica tu correo en FlatMate')
                    ->view('emails.verify');
    }
}
