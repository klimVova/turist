<?php

namespace App\Http\Controllers\Spa\TodoList;

use App\Http\Controllers\Controller;
use App\Models\SpaTodoList;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    public function __invoke(SpaTodoList $spaTodoList){
        $items =  DB::table('spa_todo_items')->where('spa_todo_list_id', '=', $spaTodoList->id)->get();
        $user = Auth::id();
        return view('spa.todolist.item', compact('user' , 'items','spaTodoList'));
    }
}
