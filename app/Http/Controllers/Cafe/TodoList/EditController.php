<?php

namespace App\Http\Controllers\Cafe\TodoList;

use App\Http\Controllers\Controller;
use App\Models\CafeTime;
use App\Models\CafeTodoList;

class EditController extends Controller
{
    public function __invoke(CafeTodoList $cafeTodoList)
    {
        return view('cafe.todolist.edit' , compact('cafeTodoList'));
    }
}
