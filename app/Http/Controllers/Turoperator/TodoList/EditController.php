<?php

namespace App\Http\Controllers\Turoperator\TodoList;

use App\Http\Controllers\Controller;
use App\Models\TuroperatorTime;
use App\Models\TuroperatorTodoList;

class EditController extends Controller
{
    public function __invoke(TuroperatorTodoList $turoperatorTodoList)
    {
        return view('turoperator.todolist.edit' , compact('turoperatorTodoList'));
    }
}
