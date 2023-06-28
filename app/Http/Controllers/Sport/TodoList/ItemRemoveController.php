<?php

namespace App\Http\Controllers\Sport\TodoList;

use App\Http\Controllers\Controller;
use App\Models\SportTodoItem;
use App\Models\SportTodoList;

class ItemRemoveController extends Controller
{
    public function __invoke($id){

        SportTodoItem::find($id)->delete();
        return back();
    }
}
