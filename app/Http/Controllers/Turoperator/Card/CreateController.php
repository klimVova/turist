<?php

namespace App\Http\Controllers\Turoperator\Card;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\District;
use App\Models\Republic;
use App\Models\Type;
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
        $turoperatorCardTags =auth()->user()->turoperatorCardTag;
        return view('turoperator.card.create', compact('user', 'types' , 'cities' , 'republics','districts','turoperatorCardTags'));
    }
}
