<?php

namespace App\Http\Controllers\Cafe\Card;

use App\Http\Controllers\Controller;
use App\Models\CafeCard;

class DeleteController extends Controller
{
    public function __invoke( CafeCard $cafeCard)
    {
        $cafeCard->delete();
        return  redirect()->route('cafe.card.index');
    }
}
