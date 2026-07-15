<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Inscripcion;

class InscripcionRecibida extends Mailable
{
    use Queueable, SerializesModels;

    public $inscripcion;

    public function __construct(Inscripcion $inscripcion)
    {
        $this->inscripcion = $inscripcion;
    }

    public function build()
    {
        return $this->subject('Confirmación de inscripción - Fortaleciendo un Estado digital seguro y confiable')
            ->view('emails.inscripcion-recibida');
    }
}
