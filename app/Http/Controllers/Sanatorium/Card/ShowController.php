<?php

namespace App\Http\Controllers\Sanatorium\Card;

use App\Http\Controllers\Controller;
use App\Models\SanatoriumCard;
use App\Models\SanatoriumCategory;

class ShowController extends Controller
{
    public function __invoke(SanatoriumCard $sanatoriumCard)
    {
        return view('sanatorium.card.show', compact('sanatoriumCard'));
    }
}
