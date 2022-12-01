<?php

namespace App\Http\Controllers\Hostel\Main;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        return view('hostel.main.index');
    }
}
