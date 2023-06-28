<?php

namespace App\Http\Controllers\Sport\TodoList;

use App\Http\Controllers\Controller;
use App\Models\SportTime;
use App\Models\SportTodoList;

class DeleteController extends Controller
{
    public function __invoke( SportTodoList $sportTodoList)
    {
        $sportTodoList->delete();
        return  redirect()->route('sport.todolist.index');
    }
}
