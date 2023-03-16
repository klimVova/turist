<?php

namespace App\Http\Controllers\Turoperator\Card;

use App\Http\Controllers\Controller;
use App\Models\TuroperatorCard;
use App\Models\TuroperatorCategory;

class ShowController extends Controller
{
    public function __invoke(TuroperatorCard $turoperatorCard)
    {
        return view('turoperator.card.show', compact('turoperatorCard'));
    }
}
