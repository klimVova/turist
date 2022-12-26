<?php

namespace App\Http\Controllers\Medical\Card;

use App\Http\Controllers\Controller;
use App\Models\MedicalCard;

class DeleteController extends Controller
{
    public function __invoke( MedicalCard $medicalCard)
    {
        $medicalCard->delete();
        return  redirect()->route('medical.card.index');
    }
}
