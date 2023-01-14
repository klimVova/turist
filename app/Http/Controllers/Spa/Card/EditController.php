<?php

namespace App\Http\Controllers\Spa\Card;

use App\Http\Controllers\Controller;
use App\Models\SpaCard;

class EditController extends Controller
{
    public function __invoke(SpaCard $spaCard)
    {
        $spaTags =auth()->user()->spaTags;
        return view('spa.card.edit' , compact('spaCard', 'spaTags'));
    }
}
