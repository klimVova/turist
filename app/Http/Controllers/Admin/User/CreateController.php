<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Republic;
use App\Models\User;

class CreateController extends Controller
{
    public function __invoke()
    {

        $roles = User::getRoles();
        $cities = City::all();
        $republics = Republic::all();
        return view('admin.user.create', compact('roles', 'cities', 'republics'));
    }
}
