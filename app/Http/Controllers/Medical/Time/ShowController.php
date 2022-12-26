<?php

namespace App\Http\Controllers\Medical\Time;

use App\Http\Controllers\Controller;
use App\Models\MedicalTime;

class ShowController extends Controller
{
    public function __invoke(MedicalTime $medicalTime)
    {
        return view('medical.time.show', compact('medicalTime'));
    }
}
