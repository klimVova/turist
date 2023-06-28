<?php

namespace App\Http\Controllers\Sport\TodoList;

use App\Http\Controllers\Controller;
use App\Models\SportTime;
use App\Models\SportTodoList;

class EditController extends Controller
{
    public function __invoke(SportTodoList $sportTodoList)
    {
        return view('sport.todolist.edit' , compact('sportTodoList'));
    }
}
