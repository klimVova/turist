<?php

namespace App\Http\Controllers\Admin\District;

use App\Http\Controllers\Controller;
use App\Models\District;

class EditController extends Controller
{
    public function __invoke(District $district)
    {
        return view('admin.district.edit' , compact('district'));
    }
}
