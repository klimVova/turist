<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\District;
use App\Models\Republic;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Category;

class EditController extends Controller
{
    public function __invoke(User $user)
    {
        $roles = User::getRoles();
        $cities = City::all();
        $districts = District::all();
        $republics = Republic::all();
        return view('admin.user.edit' , compact('user','roles', 'cities', 'republics','districts'));
    }
}
