<?php

namespace App\Http\Controllers\Turoperator\TodoList;

use App\Http\Controllers\Controller;
use App\Models\TuroperatorTodoItem;
use App\Models\TuroperatorTodoList;

class ItemRemoveController extends Controller
{
    public function __invoke($id){

        TuroperatorTodoItem::find($id)->delete();
        return back();
    }
}
