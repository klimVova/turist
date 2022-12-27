<?php

namespace App\Http\Controllers\Spa\Time;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {

        $spaTimes = auth()->user()->spaTimes;
        return view('spa.time.index', compact('spaTimes'));
    }
}
