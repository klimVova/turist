<?php

namespace App\Http\Controllers\Consulting\Main;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CardController extends Controller
{
    public function __invoke($id)
    {
        $items = auth()->user()->cats;
        $lists = DB::table('consulting_cat_users')->where('cat_id', '=', $id)->get();

        return view('consulting.card.index', compact('items', 'lists', 'id'));
    }
}
