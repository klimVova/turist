<?php

namespace App\Http\Controllers\Cafe\TodoItem;

use App\Http\Controllers\Controller;
use App\Models\CafeTodoItem;
use App\Models\HostelCategory;
use App\Models\HostelPost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function __invoke(CafeTodoItem $cafeTodoItem){
        $products =  DB::table('cafe_todo_items')->where('cafe_todo_list_id', '=', $cafeTodoItem->id)->get();
        $user = Auth::id();
        return view('cafe.todoitem.product', compact('user' , 'products','cafeTodoItem'));
    }
}
