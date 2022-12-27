<?php

namespace App\Http\Controllers\Spa\Card;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {

        $spaCards = auth()->user()->spaCards;
        return view('spa.card.index', compact('spaCards'));
    }
}
