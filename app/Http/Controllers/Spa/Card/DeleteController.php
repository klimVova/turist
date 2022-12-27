<?php

namespace App\Http\Controllers\Spa\Card;

use App\Http\Controllers\Controller;
use App\Models\SpaCard;

class DeleteController extends Controller
{
    public function __invoke( SpaCard $spaCard)
    {
        $spaCard->delete();
        return  redirect()->route('spa.card.index');
    }
}
