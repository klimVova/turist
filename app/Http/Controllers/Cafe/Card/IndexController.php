<?php

namespace App\Http\Controllers\Cafe\Card;

use App\Http\Controllers\Controller;
use App\Models\HostelCard;
use App\Models\HostelCategory;
use App\Models\HostelPost;

class IndexController extends Controller
{
    public function __invoke()
    {

        $cafeCards = auth()->user()->cafeCards;
        return view('cafe.card.index', compact('cafeCards'));
    }
}
