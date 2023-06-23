<?php

namespace App\Mail\Payment;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;

class Promocode extends Mailable
{
    use Queueable, SerializesModels;

    public $promocode;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($promocode)
    {
        $this->promocode = $promocode;
    }

    public function content()
    {
        return new Content(
            markdown: 'mail.payment.promocode',
        );
    }
}
