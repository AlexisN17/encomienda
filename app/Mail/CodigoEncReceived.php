<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CodigoEncReceived extends Mailable
{
    use Queueable, SerializesModels;
    public $codencomienda;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($codencomienda)
    {
        $this->codencomienda = $codencomienda;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      return $this->from('encomiendassedes@gmail.com','Integral Pack Express')
                  ->subject('Su codigo de encomienda.')
                  ->view('mail')
                  ->attach(public_path('css').'/logo_integral.jpg', [
                    'as' => 'logo_integral.jpg',
                    'mime' => 'image/jpeg',
                  ]);
    }
}
