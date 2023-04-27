<?php

namespace App\Http\Controllers\Turoperator\Time;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {

        $turoperatorTimes = auth()->user()->turoperatorTimes;
        return view('turoperator.time.index', compact('turoperatorTimes'));
    }
}
