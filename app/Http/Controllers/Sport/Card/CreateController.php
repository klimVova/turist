<?php

namespace App\Http\Controllers\Sport\Card;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\District;
use App\Models\Republic;
use App\Models\Type;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CreateController extends Controller
{
    public function __invoke()
    {
        $user = Auth::id();
        $user_email = DB::table('users')->where('id', '=', $user)->pluck('email');
        $types = Type::all();
        $cities = City::all();
        $districts = District::all();
        $republics = Republic::all();
        $sportCardTags =auth()->user()->sportCardTag;
        return view('sport.card.create', compact('user', 'types' , 'user_email', 'cities' , 'republics','districts','sportCardTags'));
    }
}
