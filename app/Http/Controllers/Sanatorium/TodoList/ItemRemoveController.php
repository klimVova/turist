<?php

namespace App\Http\Controllers\Sanatorium\TodoList;

use App\Http\Controllers\Controller;
use App\Models\SanatoriumTodoItem;
use App\Models\SanatoriumTodoList;

class ItemRemoveController extends Controller
{
    public function __invoke($id){

        SanatoriumTodoItem::find($id)->delete();
        return back();
    }
}
