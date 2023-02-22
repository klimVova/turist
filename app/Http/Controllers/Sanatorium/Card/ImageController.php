<?php

namespace App\Http\Controllers\Sanatorium\Card;

use App\Http\Controllers\Controller;
use App\Models\SanatoriumCategory;
use App\Models\SanatoriumCard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ImageController extends Controller
{
    public function __invoke(SanatoriumCard $sanatoriumCard){
        $images =  DB::table('sanatorium_card_images')->where('sanatorium_card_id', '=', $sanatoriumCard->id)->get();
        $sanatoriumCategories = SanatoriumCategory::all();
        $user = Auth::id();
        return view('sanatorium.card.image', compact('sanatoriumCard','images', 'user', 'sanatoriumCategories'));
    }
}
