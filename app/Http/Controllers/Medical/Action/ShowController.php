<?php

namespace App\Http\Controllers\Medical\Action;

use App\Http\Controllers\Controller;
use App\Models\MedicalAction;

class ShowController extends Controller
{
    public function __invoke(MedicalAction $medicalAction)
    {
        return view('medical.todolist.show', compact('medicalAction'));
    }
}
