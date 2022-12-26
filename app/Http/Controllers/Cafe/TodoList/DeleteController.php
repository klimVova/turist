<?php

namespace App\Http\Controllers\Cafe\TodoList;

use App\Http\Controllers\Controller;
use App\Models\CafeTime;
use App\Models\CafeTodoList;

class DeleteController extends Controller
{
    public function __invoke( CafeTodoList $cafeTodoList)
    {
        $cafeTodoList->delete();
        return  redirect()->route('cafe.todolist.index');
    }
}
