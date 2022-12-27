<?php

namespace App\Http\Controllers\Spa\TodoList;

use App\Http\Controllers\Controller;
use App\Models\SpaTime;
use App\Models\SpaTodoList;

class EditController extends Controller
{
    public function __invoke(SpaTodoList $spaTodoList)
    {
        return view('spa.todolist.edit' , compact('spaTodoList'));
    }
}
