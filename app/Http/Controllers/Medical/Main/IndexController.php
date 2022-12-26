<?php

namespace App\Http\Controllers\Medical\Main;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        return view('medical.main.index');
    }
}
