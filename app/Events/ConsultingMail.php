<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ConsultingMail
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $dd;
    public function __construct($dd)
    {
        $this->dd = $dd;
    }

}
