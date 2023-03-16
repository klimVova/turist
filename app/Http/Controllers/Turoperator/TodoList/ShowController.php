<?php

namespace App\Http\Controllers\Turoperator\TodoList;

use App\Http\Controllers\Controller;
use App\Models\TuroperatorTime;
use App\Models\TuroperatorTodoList;

class ShowController extends Controller
{
    public function __invoke(TuroperatorTodoList $turoperatorTodoList)
    {
        return view('turoperator.todolist.show', compact('turoperatorTodoList'));
    }
}
