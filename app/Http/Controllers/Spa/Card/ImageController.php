<?php

namespace App\Http\Controllers\Spa\Card;

use App\Http\Controllers\Controller;

use App\Models\SpaCard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ImageController extends Controller
{
    public function __invoke(SpaCard $spaCard){
        $images =  DB::table('spa_card_images')->where('spa_card_id', '=', $spaCard->id)->get();
        $user = Auth::id();
        return view('spa.card.image', compact('spaCard','images', 'user'));
    }
}
