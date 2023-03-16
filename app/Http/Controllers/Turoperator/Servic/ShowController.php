<?php

namespace App\Http\Controllers\Turoperator\Servic;

use App\Http\Controllers\Controller;
use App\Models\TuroperatorServic;

class ShowController extends Controller
{
    public function __invoke(TuroperatorServic $turoperatorServic)
    {
        return view('turoperator.servic.show', compact('turoperatorServic'));
    }
}
