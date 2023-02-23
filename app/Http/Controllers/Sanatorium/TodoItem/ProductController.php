<?php

namespace App\Http\Controllers\Sanatorium\TodoItem;

use App\Http\Controllers\Controller;
use App\Models\SanatoriumTodoItem;
use App\Models\HostelCategory;
use App\Models\HostelPost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function __invoke(SanatoriumTodoItem $sanatoriumTodoItem){
        $products =  DB::table('sanatorium_todo_items')->where('sanatorium_todo_list_id', '=', $sanatoriumTodoItem->id)->get();
        $user = Auth::id();
        return view('sanatorium.todoitem.product', compact('user' , 'products','sanatoriumTodoItem'));
    }
}
