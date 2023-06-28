<?php

namespace App\Http\Controllers\Sport\TodoList;

use App\Http\Controllers\Controller;
use App\Models\SportTodoList;
use App\Models\HostelCategory;
use App\Models\HostelPost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    public function __invoke(SportTodoList $sportTodoList){
        $items =  DB::table('sport_todo_items')->where('sport_todo_list_id', '=', $sportTodoList->id)->get();
        $user = Auth::id();
        return view('sport.todolist.item', compact('user' , 'items','sportTodoList'));
    }
}
