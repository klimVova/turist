<?php

namespace App\Http\Controllers\Cafe\TodoList;

use App\Http\Controllers\Controller;
use App\Models\CafeTodoItem;
use App\Models\CafeTodoList;
use App\Models\HostelImage;
use App\Models\HostelPost;
use App\Models\Image;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemStoreController extends Controller
{
    public function __invoke(Request $request, CafeTodoList $cafeTodoList)
    {
        CafeTodoItem::create([
            'cafe_todo_list_id' => $cafeTodoList->id,
            'price'=> $request->price,
            'title' => $request->title,
        ]);
        return redirect()->route('cafe.todolist.index');
    }
}
