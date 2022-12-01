<?php

namespace App\Http\Controllers\Hostel\Category;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        return view('hostel.category.index');
    }
}
