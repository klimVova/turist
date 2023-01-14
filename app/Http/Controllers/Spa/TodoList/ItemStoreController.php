<?php

namespace App\Http\Controllers\Spa\TodoList;

use App\Http\Controllers\Controller;
use App\Models\SpaTodoItem;
use App\Models\SpaTodoList;
use Illuminate\Http\Request;

class ItemStoreController extends Controller
{
    public function __invoke(Request $request, SpaTodoList $spaTodoList)
    {
        //dd($request->title);
        SpaTodoItem::create([
            'spa_todo_list_id' => $spaTodoList->id,
            'title' => $request->title,
            'price' => $request->price,
        ]);
        return redirect()->route('spa.todolist.index');
    }
}
