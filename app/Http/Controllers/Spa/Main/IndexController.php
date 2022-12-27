<?php

namespace App\Http\Controllers\Spa\Main;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        return view('spa.main.index');
    }
}
