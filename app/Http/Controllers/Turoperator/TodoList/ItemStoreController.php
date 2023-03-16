<?php

namespace App\Http\Controllers\Turoperator\TodoList;

use App\Http\Controllers\Controller;
use App\Models\TuroperatorTodoItem;
use App\Models\TuroperatorTodoList;
use App\Models\HostelImage;
use App\Models\HostelPost;
use App\Models\Image;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemStoreController extends Controller
{
    public function __invoke(Request $request, TuroperatorTodoList $turoperatorTodoList)
    {
        TuroperatorTodoItem::create([
            'turoperator_todo_list_id' => $turoperatorTodoList->id,
            'price'=> $request->price,
            'title' => $request->title,
        ]);
        return redirect()->route('turoperator.todolist.index');
    }
}
