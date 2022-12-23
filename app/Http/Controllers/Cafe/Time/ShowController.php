<?php

namespace App\Http\Controllers\Cafe\Time;

use App\Http\Controllers\Controller;
use App\Models\CafeTime;

class ShowController extends Controller
{
    public function __invoke(CafeTime $cafeTime)
    {
        return view('cafe.time.show', compact('cafeTime'));
    }
}
