<?php

namespace App\Http\Controllers\Turoperator\Time;

use App\Http\Controllers\Controller;
use App\Models\TuroperatorTime;

class EditController extends Controller
{
    public function __invoke(TuroperatorTime $turoperatorTime)
    {
        return view('turoperator.time.edit' , compact('turoperatorTime'));
    }
}
