<?php

namespace App\Http\Controllers\Cafe\TodoItem;

use App\Http\Controllers\Controller;
use App\Models\CafeCard;
use App\Models\CafeTodoItem;

class EditController extends Controller
{
    public function __invoke(CafeTodoItem $cafeTodoItem)
    {
        return view('cafe.todoitem.edit' , compact('cafeTodoItem'));
    }
}
