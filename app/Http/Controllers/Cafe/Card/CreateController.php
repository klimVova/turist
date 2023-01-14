<?php

namespace App\Http\Controllers\Cafe\Card;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\District;
use App\Models\Republic;
use App\Models\Type;
use http\Env\Request;
use Illuminate\Support\Facades\Auth;

class CreateController extends Controller
{
    public function __invoke()
    {
        $user = Auth::id();
        $types = Type::all();
        $cities = City::all();
        $districts = District::all();
        $republics = Republic::all();
        $cafeTags =auth()->user()->cafeTags;
        return view('cafe.card.create', compact('user', 'types' , 'cities' , 'republics','districts', 'cafeTags'));
    }
}
