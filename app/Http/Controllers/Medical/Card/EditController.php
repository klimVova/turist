<?php

namespace App\Http\Controllers\Medical\Card;

use App\Http\Controllers\Controller;
use App\Models\MedicalCard;

class EditController extends Controller
{
    public function __invoke(MedicalCard $medicalCard)
    {
        return view('medical.card.edit' , compact('medicalCard'));
    }
}
