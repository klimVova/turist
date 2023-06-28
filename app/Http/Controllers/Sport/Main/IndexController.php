<?php

namespace App\Http\Controllers\Sport\Main;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        return view('sport.main.index');
    }
}
