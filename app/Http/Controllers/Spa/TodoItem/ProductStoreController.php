<?php

namespace App\Http\Controllers\Spa\TodoItem;

use App\Http\Controllers\Controller;
use App\Models\SpaTodoItem;
use App\Models\SpaTodoList;
use App\Models\SpaTodoProduct;
use Illuminate\Http\Request;

class ProductStoreController extends Controller
{
    public function __invoke(Request $request, SpaTodoItem $spaTodoItem)
    {
        SpaTodoProduct::create([
            'spa_todo_item_id' => $spaTodoItem->id,
            'title' => $request->title,
            'price' => $request->price,
        ]);
        return redirect()->route('spa.todolist.index');
    }
}
