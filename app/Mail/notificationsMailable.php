<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class notificationsMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = 'Notificacion de Sin Fronteras PO';
    public $user;
    public $persona;
    public $tipo;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user,$persona,$tipo)
    {
        $this->user = $user;
        $this->persona = $persona;
        $this->tipo = $tipo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('plantilla.email');
    }
}
