<?php

namespace App\Http\Controllers\Cafe\Card;

use App\Http\Controllers\Controller;
use App\Models\CafeCard;
use App\Models\HostelCard;
use App\Models\HostelCategory;

class ShowController extends Controller
{
    public function __invoke(CafeCard $cafeCard)
    {
        return view('cafe.card.show', compact('cafeCard'));
    }
}
