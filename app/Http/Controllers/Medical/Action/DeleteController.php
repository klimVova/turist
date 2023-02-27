<?php

namespace App\Http\Controllers\Medical\Action;

use App\Http\Controllers\Controller;
use App\Models\MedicalAction;

class DeleteController extends Controller
{
    public function __invoke( MedicalAction $medicalAction)
    {
        $medicalAction->delete();
        return  redirect()->route('medical.action.index');
    }
}
