<?php

namespace App\Http\Controllers\Medical\Time;

use App\Http\Controllers\Controller;
use App\Models\MedicalTime;

class EditController extends Controller
{
    public function __invoke(MedicalTime $medicalTime)
    {
        return view('medical.time.edit' , compact('medicalTime'));
    }
}
