<?php

namespace App\Http\Controllers\Medical\Card;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {

        $medicalCards = auth()->user()->medicalCards;
        return view('medical.card.index', compact('medicalCards'));
    }
}
