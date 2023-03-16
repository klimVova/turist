<?php

namespace App\Http\Controllers\Turoperator\TodoList;

use App\Http\Controllers\Controller;
use App\Models\TuroperatorTodoList;
use App\Models\HostelCategory;
use App\Models\HostelPost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    public function __invoke(TuroperatorTodoList $turoperatorTodoList){
        $items =  DB::table('turoperator_todo_items')->where('turoperator_todo_list_id', '=', $turoperatorTodoList->id)->get();
        $user = Auth::id();
        return view('turoperator.todolist.item', compact('user' , 'items','turoperatorTodoList'));
    }
}
