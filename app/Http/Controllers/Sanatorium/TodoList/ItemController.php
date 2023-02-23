<?php

namespace App\Http\Controllers\Sanatorium\TodoList;

use App\Http\Controllers\Controller;
use App\Models\SanatoriumTodoList;
use App\Models\HostelCategory;
use App\Models\HostelPost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    public function __invoke(SanatoriumTodoList $sanatoriumTodoList){
        $items =  DB::table('sanatorium_todo_items')->where('sanatorium_todo_list_id', '=', $sanatoriumTodoList->id)->get();
        $user = Auth::id();
        return view('sanatorium.todolist.item', compact('user' , 'items','sanatoriumTodoList'));
    }
}
