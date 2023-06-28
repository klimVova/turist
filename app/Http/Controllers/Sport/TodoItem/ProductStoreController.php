<?php

namespace App\Http\Controllers\Sport\TodoItem;

use App\Http\Controllers\Controller;
use App\Models\SportTodoItem;
use App\Models\SportTodoList;
use App\Models\SportTodoProduct;
use Illuminate\Http\Request;

class ProductStoreController extends Controller
{
    public function __invoke(Request $request, SportTodoItem $sportTodoItem)
    {
        SportTodoProduct::create([
            'sport_todo_item_id' => $sportTodoItem->id,
            'title' => $request->title,
            'price' => $request->price,
        ]);
        return redirect()->route('sport.todolist.index');
    }
}
