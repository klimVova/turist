<?php

namespace App\Http\Controllers\Medical\Card;

use App\Http\Controllers\Controller;

use App\Models\MedicalCard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ImageController extends Controller
{
    public function __invoke(MedicalCard $medicalCard){
        $images =  DB::table('medical_card_images')->where('medical_card_id', '=', $medicalCard->id)->get();

        $user = Auth::id();
        return view('medical.card.image', compact('medicalCard','images', 'user'));
    }
}
