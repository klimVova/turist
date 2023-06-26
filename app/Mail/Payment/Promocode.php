<?php

namespace App\Mail\Payment;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;

class Promocode extends Mailable
{
    use Queueable, SerializesModels;

    public $d;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($d)
    {
        $this->d = $d;
    }

    public function content()
    {
        return new Content(
            markdown: 'mail.payment.promocode',
        );
    }
}
