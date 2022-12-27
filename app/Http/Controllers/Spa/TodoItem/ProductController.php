<?php

namespace App\Http\Controllers\Spa\TodoItem;

use App\Http\Controllers\Controller;
use App\Models\SpaTodoItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function __invoke(SpaTodoItem $spaTodoItem){
        $products =  DB::table('spa_todo_items')->where('spa_todo_list_id', '=', $spaTodoItem->id)->get();
        $user = Auth::id();
        return view('spa.todoitem.product', compact('user' , 'products', 'spaTodoItem'));
    }
}
