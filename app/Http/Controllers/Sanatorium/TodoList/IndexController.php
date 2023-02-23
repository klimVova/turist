<?php

namespace App\Http\Controllers\Sanatorium\TodoList;

use App\Http\Controllers\Controller;
use App\Models\SanatoriumTodoItem;
use App\Models\SanatoriumTodoList;
use App\Models\SanatoriumTodoProduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function __invoke()
    {
        $user = Auth::id();
        $sanatoriumTodoLists = auth()->user()->sanatoriumTodoLists;
        $items =  SanatoriumTodoItem::all();
        $products =  SanatoriumTodoProduct::all();
        return view('sanatorium.todolist.index', compact('user','sanatoriumTodoLists', 'items', 'products'));
    }
}
