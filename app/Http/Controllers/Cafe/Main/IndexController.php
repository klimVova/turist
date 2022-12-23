<?php

namespace App\Http\Controllers\Cafe\Main;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        return view('cafe.main.index');
    }
}
