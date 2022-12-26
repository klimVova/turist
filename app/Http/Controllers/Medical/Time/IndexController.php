<?php

namespace App\Http\Controllers\Medical\Time;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {

        $medicalTimes = auth()->user()->medicalTimes;
        return view('medical.time.index', compact('medicalTimes'));
    }
}
