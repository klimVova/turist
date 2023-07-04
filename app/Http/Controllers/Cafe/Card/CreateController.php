<?php

namespace App\Http\Controllers\Cafe\Card;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\District;
use App\Models\Republic;
use App\Models\Type;
use http\Env\Request;
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
        $cafeTags =auth()->user()->cafeTags;
        return view('cafe.card.create', compact('user', 'types' , 'cities' , 'republics','districts', 'cafeTags','user_email'));
    }
}
