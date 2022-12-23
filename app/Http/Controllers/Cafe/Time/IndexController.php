<?php

namespace App\Http\Controllers\Cafe\Time;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {

        $cafeTimes = auth()->user()->cafeTimes;
        return view('cafe.time.index', compact('cafeTimes'));
    }
}
