<?php

namespace App\Http\Controllers\Admin\District;

use App\Http\Controllers\Controller;

class CreateController extends Controller
{
    public function __invoke()
    {
        return view('admin.district.create');
    }
}
