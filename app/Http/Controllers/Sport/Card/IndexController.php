<?php

namespace App\Http\Controllers\Sport\Card;

use App\Http\Controllers\Controller;
use App\Models\SportCard;
use App\Models\SportCategory;
use App\Models\SportPost;

class IndexController extends Controller
{
    public function __invoke()
    {

        $sportCards = auth()->user()->sportCards;
        return view('sport.card.index', compact('sportCards'));
    }
}
