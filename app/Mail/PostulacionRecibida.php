<?php

namespace App\Mail;

use App\Models\Postulacion;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PostulacionRecibida extends Mailable
{
    use Queueable, SerializesModels;

    public $postulacion;

    public function __construct(Postulacion $postulacion)
    {
        $this->postulacion = $postulacion;
    }

    public function build()
    {
        return $this->subject('Confirmación de postulación - Instrumento de Evaluación y Selección de Entidades Beneficiarias')
            ->view('emails.postulacion-recibida');
    }
}
