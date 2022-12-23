<?php

namespace App\Http\Controllers\CafeShow;

use App\Http\Controllers\Controller;
use App\Models\CafeCard;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ShowController extends Controller
{
    public function __invoke(CafeCard $cafeCard, User $user)
    {
        $posts =  DB::table('cafe_posts')->where('user_id', '=', $cafeCard->user_id)->get();
        $categories = DB::table('cafe_categories')->where('user_id', '=', $cafeCard->user_id)->get();
        $catalogs = DB::table('cafe_catalogs')->where('user_id', '=', $cafeCard->user_id)->get();
        $times = DB::table('cafe_times')->where('user_id', '=', $cafeCard->user_id)->get();

        return view('cafeShow.show', compact('cafeCard', 'posts', 'categories', 'catalogs','times'));
    }
}