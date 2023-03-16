<?php

namespace App\Http\Controllers\Turoperator\TodoItem;

use App\Http\Controllers\Controller;
use App\Models\TuroperatorTodoItem;
use App\Models\HostelCategory;
use App\Models\HostelPost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function __invoke(TuroperatorTodoItem $turoperatorTodoItem){
        $products =  DB::table('turoperator_todo_items')->where('turoperator_todo_list_id', '=', $turoperatorTodoItem->id)->get();
        $user = Auth::id();
        return view('turoperator.todoitem.product', compact('user' , 'products','turoperatorTodoItem'));
    }
}
