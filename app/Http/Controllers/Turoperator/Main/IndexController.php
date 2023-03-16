<?php

namespace App\Http\Controllers\Turoperator\Main;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        return view('turoperator.main.index');
    }
}
