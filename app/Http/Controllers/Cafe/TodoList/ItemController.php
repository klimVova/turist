<?php

namespace App\Http\Controllers\Cafe\TodoList;

use App\Http\Controllers\Controller;
use App\Models\CafeTodoList;
use App\Models\HostelCategory;
use App\Models\HostelPost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    public function __invoke(CafeTodoList $cafeTodoList){
        $items =  DB::table('cafe_todo_items')->where('cafe_todo_list_id', '=', $cafeTodoList->id)->get();
        $user = Auth::id();
        return view('cafe.todolist.item', compact('user' , 'items','cafeTodoList'));
    }
}
