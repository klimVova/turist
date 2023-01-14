<?php

namespace App\Http\Controllers\Cafe\TodoItem;

use App\Http\Controllers\Controller;
use App\Models\CafeTodoItem;
use App\Models\CafeTodoList;
use App\Models\CafeTodoProduct;
use App\Models\HostelImage;
use App\Models\HostelPost;
use App\Models\Image;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductStoreController extends Controller
{
    public function __invoke(Request $request, CafeTodoItem $cafeTodoItem)
    {
        CafeTodoProduct::create([
            'cafe_todo_item_id' => $cafeTodoItem->id,
            'title' => $request->title,
            'price' => $request->price,
        ]);
        return redirect()->route('cafe.todolist.index');
    }
}
