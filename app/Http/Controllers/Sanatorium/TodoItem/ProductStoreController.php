<?php

namespace App\Http\Controllers\Sanatorium\TodoItem;

use App\Http\Controllers\Controller;
use App\Models\SanatoriumTodoItem;
use App\Models\SanatoriumTodoList;
use App\Models\SanatoriumTodoProduct;
use Illuminate\Http\Request;

class ProductStoreController extends Controller
{
    public function __invoke(Request $request, SanatoriumTodoItem $sanatoriumTodoItem)
    {
        SanatoriumTodoProduct::create([
            'sanatorium_todo_item_id' => $sanatoriumTodoItem->id,
            'title' => $request->title,
            'price' => $request->price,
        ]);
        return redirect()->route('sanatorium.todolist.index');
    }
}
