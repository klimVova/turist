<?php

namespace App\Http\Controllers\Admin\City;

use App\Http\Controllers\Controller;
use App\Models\City;

class EditController extends Controller
{
    public function __invoke(City $city)
    {
        return view('admin.city.edit' , compact('city'));
    }
}
