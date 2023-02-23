<?php

namespace App\Http\Controllers\Sanatorium\TodoList;

use App\Http\Controllers\Controller;
use App\Models\SanatoriumTime;
use App\Models\SanatoriumTodoList;

class ShowController extends Controller
{
    public function __invoke(SanatoriumTodoList $sanatoriumTodoList)
    {
        return view('sanatorium.todolist.show', compact('sanatoriumTodoList'));
    }
}
