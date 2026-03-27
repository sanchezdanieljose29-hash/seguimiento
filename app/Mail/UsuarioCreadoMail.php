<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UsuarioCreadoMail extends Mailable
{
    use Queueable, SerializesModels;

    public string $nombreUsuario;
    public string $correo;
    public string $password;

    public function __construct(string $nombreUsuario, string $correo, string $password)
    {
        $this->nombreUsuario = $nombreUsuario;
        $this->correo        = $correo;
        $this->password      = $password;
    }

    public function build()
    {
        return $this->subject('Bienvenido - Tus credenciales de acceso')
                    ->markdown('emails.usuario-creado');
    }
}