<?php

namespace App\Http\Controllers\Medical\Action;

use App\Http\Controllers\Controller;
use App\Models\MedicalAction;

class EditController extends Controller
{
    public function __invoke(MedicalAction $medicalAction)
    {
        return view('medical.action.edit' , compact('medicalAction'));
    }
}
