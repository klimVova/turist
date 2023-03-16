<?php

namespace App\Http\Controllers\Turoperator\Servic;

use App\Http\Controllers\Controller;
use App\Models\TuroperatorServic;

class EditController extends Controller
{
    public function __invoke(TuroperatorServic $turoperatorServic)
    {
        return view('turoperator.servic.edit' , compact('turoperatorServic'));
    }
}
