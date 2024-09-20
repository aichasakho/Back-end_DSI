<?php

namespace App\Mail;

use App\Models\Reservation;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReponseReservation extends Mailable
{
    use Queueable, SerializesModels;

    public $reservation;
    public $reponse;

    public function __construct(Reservation $reservation, $reponse)
    {
        $this->reservation = $reservation;
        $this->reponse = $reponse;
    }

    public function build()
    {
        return $this->view('emails.reponse-reservation')
                    ->subject('Réponse de l"agent par rapport à la réservation')
                    ->with([
                        'reservation' => $this->reservation,
                        'reponse' => $this->reponse,
                    ])
                    ->to('aichasakho2205@gmail.com');
    }
}
