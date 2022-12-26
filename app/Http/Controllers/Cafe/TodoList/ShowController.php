<?php

namespace App\Http\Controllers\Cafe\TodoList;

use App\Http\Controllers\Controller;
use App\Models\CafeTime;
use App\Models\CafeTodoList;

class ShowController extends Controller
{
    public function __invoke(CafeTodoList $cafeTodoList)
    {
        return view('cafe.todolist.show', compact('cafeTodoList'));
    }
}
