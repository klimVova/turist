<?php

namespace App\Http\Controllers\Medical\Card;

use App\Http\Controllers\Controller;
use App\Models\MedicalCard;
use App\Models\HostelCard;
use App\Models\HostelCategory;

class ShowController extends Controller
{
    public function __invoke(MedicalCard $medicalCard)
    {
        return view('medical.card.show', compact('medicalCard'));
    }
}
