<?php

namespace App\Mail\Payment;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;

class Consulting extends Mailable
{
    use Queueable, SerializesModels;

    public $dd;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($dd)
    {
        $this->dd = $dd;
    }

    public function content()
    {
        return new Content(
            markdown: 'mail.payment.consulting',
        );
    }
}
