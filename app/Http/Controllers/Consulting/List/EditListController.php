<?php

namespace App\Http\Controllers\Consulting\List;

use App\Http\Controllers\Controller;
use App\Models\ConsultingList;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EditListController extends Controller
{
    public function __invoke(ConsultingList $consultingList)
    {

        $user = Auth::id();
        $items = auth()->user()->cats;
        $lists = DB::table('consulting_cat_users')->where('cat_id', '=', $consultingList)->get();
        return view('consulting.list.edit', compact('consultingList','user' , 'items','lists'));
    }
}
