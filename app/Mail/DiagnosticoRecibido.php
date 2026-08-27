<?php

namespace App\Mail;

use App\Models\Diagnostico;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DiagnosticoRecibido extends Mailable
{
    use Queueable, SerializesModels;

    public $diagnostico;

    public function __construct(Diagnostico $diagnostico)
    {
        $this->diagnostico = $diagnostico;
    }

    public function build()
    {
        return $this->subject('Confirmación de diligenciamiento - Diagnóstico de Infraestructura IA - Proyecto IA para el Estado')
            ->view('emails.diagnostico-recibido');
    }
}
