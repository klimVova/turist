<?php

namespace App\Http\Controllers\Cafe\TodoList;

use App\Http\Controllers\Controller;
use App\Models\CafeTodoItem;
use App\Models\CafeTodoList;
use App\Models\Category;
use App\Models\HostelCategory;
use App\Models\HostelImage;
use App\Models\HostelPost;
use App\Models\Image;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ItemRemoveController extends Controller
{
    public function __invoke($id){

        CafeTodoItem::find($id)->delete();
        return back();
    }
}
