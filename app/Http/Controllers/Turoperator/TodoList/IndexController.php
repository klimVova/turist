<?php

namespace App\Http\Controllers\Turoperator\TodoList;

use App\Http\Controllers\Controller;
use App\Models\TuroperatorTodoItem;
use App\Models\TuroperatorTodoList;
use App\Models\TuroperatorTodoProduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function __invoke()
    {
        $user = Auth::id();
        $turoperatorTodoLists = auth()->user()->turoperatorTodoLists;
        $items =  TuroperatorTodoItem::all();
        $products =  TuroperatorTodoProduct::all();
        return view('turoperator.todolist.index', compact('user','turoperatorTodoLists', 'items', 'products'));
    }
}
