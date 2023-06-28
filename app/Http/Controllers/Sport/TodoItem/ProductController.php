<?php

namespace App\Http\Controllers\Sport\TodoItem;

use App\Http\Controllers\Controller;
use App\Models\SportTodoItem;
use App\Models\HostelCategory;
use App\Models\HostelPost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function __invoke(SportTodoItem $sportTodoItem){
        $products =  DB::table('sport_todo_items')->where('sport_todo_list_id', '=', $sportTodoItem->id)->get();
        $user = Auth::id();
        return view('sport.todoitem.product', compact('user' , 'products','sportTodoItem'));
    }
}
