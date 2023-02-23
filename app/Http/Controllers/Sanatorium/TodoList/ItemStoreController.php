<?php

namespace App\Http\Controllers\Sanatorium\TodoList;

use App\Http\Controllers\Controller;
use App\Models\SanatoriumTodoItem;
use App\Models\SanatoriumTodoList;
use App\Models\HostelImage;
use App\Models\HostelPost;
use App\Models\Image;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemStoreController extends Controller
{
    public function __invoke(Request $request, SanatoriumTodoList $sanatoriumTodoList)
    {
        SanatoriumTodoItem::create([
            'sanatorium_todo_list_id' => $sanatoriumTodoList->id,
            'price'=> $request->price,
            'title' => $request->title,
        ]);
        return redirect()->route('sanatorium.todolist.index');
    }
}
