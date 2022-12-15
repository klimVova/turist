<?php

namespace App\Http\Controllers\Admin\District;

use App\Http\Controllers\Controller;
use App\Models\District;

class IndexController extends Controller
{
    public function __invoke()
    {
        $districts = District::all();
        return view('admin.district.index', compact('districts'));
    }
}
