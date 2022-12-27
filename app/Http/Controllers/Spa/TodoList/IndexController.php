<?php

namespace App\Http\Controllers\Spa\TodoList;

use App\Http\Controllers\Controller;
use App\Models\SpaTodoItem;
use App\Models\SpaTodoList;
use App\Models\SpaTodoProduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function __invoke()
    {
        $user = Auth::id();
        $spaTodoLists = auth()->user()->spaTodoLists;
        $items =  SpaTodoItem::all();
        $products =  SpaTodoProduct::all();
        return view('spa.todolist.index', compact('user','spaTodoLists', 'items', 'products'));
    }
}
