<?php

namespace App\Http\Controllers\Medical\Time;

use App\Http\Controllers\Controller;
use App\Models\MedicalTime;

class DeleteController extends Controller
{
    public function __invoke( MedicalTime $medicalTime)
    {
        $medicalTime->delete();
        return  redirect()->route('medical.time.index');
    }
}
