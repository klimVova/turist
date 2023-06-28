<?php

namespace App\Http\Controllers\Sport\Card;

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
        $sportCardTags =auth()->user()->sportCardTag;
        return view('sport.card.create', compact('user', 'types' , 'cities' , 'republics','districts','sportCardTags'));
    }
}
