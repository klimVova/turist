<?php

namespace App\Http\Controllers\Sport\TodoItem;

use App\Http\Controllers\Controller;
use App\Models\SportCard;
use App\Models\SportTodoItem;

class EditController extends Controller
{
    public function __invoke(SportTodoItem $sportTodoItem)
    {
        return view('sport.todoitem.edit' , compact('sportTodoItem'));
    }
}
