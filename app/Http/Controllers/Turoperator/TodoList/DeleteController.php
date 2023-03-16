<?php

namespace App\Http\Controllers\Turoperator\TodoList;

use App\Http\Controllers\Controller;
use App\Models\TuroperatorTime;
use App\Models\TuroperatorTodoList;

class DeleteController extends Controller
{
    public function __invoke( TuroperatorTodoList $turoperatorTodoList)
    {
        $turoperatorTodoList->delete();
        return  redirect()->route('turoperator.todolist.index');
    }
}
