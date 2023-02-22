<?php

namespace App\Http\Controllers\Sanatorium\Card;

use App\Http\Controllers\Controller;
use App\Models\SanatoriumCard;
use App\Models\SanatoriumCategory;
use App\Models\SanatoriumPost;

class IndexController extends Controller
{
    public function __invoke()
    {

        $sanatoriumCards = auth()->user()->sanatoriumCards;
        return view('sanatorium.card.index', compact('sanatoriumCards'));
    }
}
