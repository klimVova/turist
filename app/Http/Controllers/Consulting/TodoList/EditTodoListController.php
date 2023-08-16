<?php

namespace App\Http\Controllers\Consulting\TodoList;

use App\Http\Controllers\Controller;
use App\Models\ConsultingTodoList;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EditTodoListController extends Controller
{
    public function __invoke(ConsultingTodoList $consultingTodoList)
    {

        $user = Auth::id();
        $items = auth()->user()->cats;
        $lists = DB::table('consulting_cat_users')->where('cat_id', '=', $consultingTodoList)->get();
        return view('consulting.todolist.edit', compact('consultingTodoList','user' , 'items','lists'));
    }
}
