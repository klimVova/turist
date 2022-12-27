<?php

namespace App\Http\Controllers\Spa\Card;

use App\Http\Controllers\Controller;
use App\Models\SpaCard;
use App\Models\HostelCard;
use App\Models\HostelCategory;

class ShowController extends Controller
{
    public function __invoke(SpaCard $spaCard)
    {
        return view('spa.card.show', compact('spaCard'));
    }
}
