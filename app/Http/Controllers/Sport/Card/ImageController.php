<?php

namespace App\Http\Controllers\Sport\Card;

use App\Http\Controllers\Controller;
use App\Models\SportCategory;
use App\Models\SportCard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ImageController extends Controller
{
    public function __invoke(SportCard $sportCard){
        $images =  DB::table('sport_card_images')->where('sport_card_id', '=', $sportCard->id)->get();
        $sportCategories = SportCategory::all();
        $user = Auth::id();
        return view('sport.card.image', compact('sportCard','images', 'user', 'sportCategories'));
    }
}
