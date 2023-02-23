<?php

namespace App\Http\Controllers\Sanatorium\TodoList;

use App\Http\Controllers\Controller;
use App\Models\SanatoriumTime;
use App\Models\SanatoriumTodoList;

class DeleteController extends Controller
{
    public function __invoke( SanatoriumTodoList $sanatoriumTodoList)
    {
        $sanatoriumTodoList->delete();
        return  redirect()->route('sanatorium.todolist.index');
    }
}
