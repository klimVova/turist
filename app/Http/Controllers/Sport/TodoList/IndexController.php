<?php

namespace App\Http\Controllers\Sport\TodoList;

use App\Http\Controllers\Controller;
use App\Models\SportTodoItem;
use App\Models\SportTodoList;
use App\Models\SportTodoProduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function __invoke()
    {
        $user = Auth::id();
        $sportTodoLists = auth()->user()->sportTodoLists;
        $items =  SportTodoItem::all();
        $products =  SportTodoProduct::all();
        return view('sport.todolist.index', compact('user','sportTodoLists', 'items', 'products'));
    }
}
