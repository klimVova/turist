<?php

namespace App\Http\Controllers\Admin\City;

use App\Http\Controllers\Controller;
use App\Models\City;

class ShowController extends Controller
{
    public function __invoke(City $city)
    {
        return view('admin.city.show', compact('city'));
    }
}
