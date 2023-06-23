<?php

namespace App\Http\Controllers\Cafe\Card;

use App\Http\Controllers\Controller;
use App\Models\CafeCard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ImageController extends Controller
{
    public function __invoke(CafeCard $cafeCard){
        $images =  DB::table('cafe_card_images')->where('cafe_card_id', '=', $cafeCard->id)->get();
        $user = Auth::id();
        return view('cafe.card.image', compact('cafeCard','images', 'user'));
    }
}
