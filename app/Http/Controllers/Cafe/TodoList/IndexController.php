<?php

namespace App\Http\Controllers\Cafe\TodoList;

use App\Http\Controllers\Controller;
use App\Models\CafeTodoItem;
use App\Models\CafeTodoList;
use App\Models\CafeTodoProduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function __invoke()
    {
        $user = Auth::id();
        $cafeTodoLists = auth()->user()->cafeTodoLists;
        $items =  CafeTodoItem::all();
        $products =  CafeTodoProduct::all();
        return view('cafe.todolist.index', compact('user','cafeTodoLists', 'items', 'products'));
    }
}
