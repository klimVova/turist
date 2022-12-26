<?php

namespace App\Http\Controllers\Medical\TodoList;

use App\Http\Controllers\Controller;
use App\Models\MedicalTodoItem;
use App\Models\MedicalTodoList;

class ItemRemoveController extends Controller
{
    public function __invoke($id){

        MedicalTodoItem::find($id)->delete();
        return back();
    }
}
