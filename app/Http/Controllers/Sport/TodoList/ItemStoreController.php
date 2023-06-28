<?php

namespace App\Http\Controllers\Sport\TodoList;

use App\Http\Controllers\Controller;
use App\Models\SportTodoItem;
use App\Models\SportTodoList;
use App\Models\HostelImage;
use App\Models\HostelPost;
use App\Models\Image;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemStoreController extends Controller
{
    public function __invoke(Request $request, SportTodoList $sportTodoList)
    {
        SportTodoItem::create([
            'sport_todo_list_id' => $sportTodoList->id,
            'price'=> $request->price,
            'title' => $request->title,
        ]);
        return redirect()->route('sport.todolist.index');
    }
}
