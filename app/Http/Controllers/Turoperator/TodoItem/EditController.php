<?php

namespace App\Http\Controllers\Turoperator\TodoItem;

use App\Http\Controllers\Controller;
use App\Models\TuroperatorCard;
use App\Models\TuroperatorTodoItem;

class EditController extends Controller
{
    public function __invoke(TuroperatorTodoItem $TuroperatorTodoItem)
    {
        return view('Turoperator.todoitem.edit' , compact('TuroperatorTodoItem'));
    }
}
