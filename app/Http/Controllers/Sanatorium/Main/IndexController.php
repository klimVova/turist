<?php

namespace App\Http\Controllers\Sanatorium\Main;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        return view('sanatorium.main.index');
    }
}
