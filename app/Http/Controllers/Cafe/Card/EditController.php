<?php

namespace App\Http\Controllers\Cafe\Card;

use App\Http\Controllers\Controller;
use App\Models\CafeCard;

class EditController extends Controller
{
    public function __invoke(CafeCard $cafeCard)
    {
        return view('cafe.card.edit' , compact('cafeCard'));
    }
}
