<?php

namespace App\Http\Controllers\Sport\Card;

use App\Http\Controllers\Controller;
use App\Models\SportCard;
use App\Models\SportCategory;

class ShowController extends Controller
{
    public function __invoke(SportCard $sportCard)
    {
        return view('sport.card.show', compact('sportCard'));
    }
}
