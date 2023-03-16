<?php

namespace App\Http\Controllers\Turoperator\Card;

use App\Http\Controllers\Controller;
use App\Models\TuroperatorCategory;
use App\Models\TuroperatorCard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ImageController extends Controller
{
    public function __invoke(TuroperatorCard $turoperatorCard){
        $images =  DB::table('turoperator_card_images')->where('turoperator_card_id', '=', $turoperatorCard->id)->get();
        $turoperatorCategories = TuroperatorCategory::all();
        $user = Auth::id();
        return view('turoperator.card.image', compact('turoperatorCard','images', 'user', 'turoperatorCategories'));
    }
}
