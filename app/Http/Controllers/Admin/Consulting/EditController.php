<?php

namespace App\Http\Controllers\Admin\Consulting;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\ConsultingCat;
use App\Models\District;
use App\Models\Republic;
use App\Models\Type;
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
        $types = Type::all();
        $consultingCats = ConsultingCat::all();
        return view('admin.consulting.edit' , compact('user','types' , 'roles', 'cities', 'republics','districts','consultingCats'));
    }
}
