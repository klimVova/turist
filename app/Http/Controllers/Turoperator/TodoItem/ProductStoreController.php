<?php

namespace App\Http\Controllers\Turoperator\TodoItem;

use App\Http\Controllers\Controller;
use App\Models\TuroperatorTodoItem;
use App\Models\TuroperatorTodoList;
use App\Models\TuroperatorTodoProduct;
use Illuminate\Http\Request;

class ProductStoreController extends Controller
{
    public function __invoke(Request $request, TuroperatorTodoItem $turoperatorTodoItem)
    {
        TuroperatorTodoProduct::create([
            'turoperator_todo_item_id' => $turoperatorTodoItem->id,
            'title' => $request->title,
            'price' => $request->price,
        ]);
        return redirect()->route('turoperator.todolist.index');
    }
}
