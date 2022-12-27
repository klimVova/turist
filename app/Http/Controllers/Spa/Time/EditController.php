<?php

namespace App\Http\Controllers\Spa\Time;

use App\Http\Controllers\Controller;
use App\Models\SpaTime;

class EditController extends Controller
{
    public function __invoke(SpaTime $spaTime)
    {
        return view('spa.time.edit' , compact('spaTime'));
    }
}
