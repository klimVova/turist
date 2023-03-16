<?php

namespace App\Http\Controllers\Turoperator\Card;

use App\Http\Controllers\Controller;
use App\Models\TuroperatorCard;
use App\Models\TuroperatorCategory;
use App\Models\TuroperatorPost;

class IndexController extends Controller
{
    public function __invoke()
    {

        $turoperatorCards = auth()->user()->turoperatorCards;
        return view('turoperator.card.index', compact('turoperatorCards'));
    }
}
