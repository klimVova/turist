<?php

namespace App\Http\Controllers\Sanatorium\TodoItem;

use App\Http\Controllers\Controller;
use App\Models\SanatoriumCard;
use App\Models\SanatoriumTodoItem;

class EditController extends Controller
{
    public function __invoke(SanatoriumTodoItem $sanatoriumTodoItem)
    {
        return view('sanatorium.todoitem.edit' , compact('sanatoriumTodoItem'));
    }
}
