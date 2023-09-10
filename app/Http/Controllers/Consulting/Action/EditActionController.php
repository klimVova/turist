<?php

namespace App\Http\Controllers\Consulting\Action;

use App\Http\Controllers\Controller;
use App\Models\ConsultingAction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EditActionController extends Controller
{
    public function __invoke(ConsultingAction $consultingAction)
    {

        $user = Auth::id();
        $items = auth()->user()->cats;
        $lists = DB::table('consulting_cat_users')->where('cat_id', '=', $consultingAction)->get();
        return view('consulting.action.edit', compact('consultingAction','user' , 'items','lists'));
    }
}
