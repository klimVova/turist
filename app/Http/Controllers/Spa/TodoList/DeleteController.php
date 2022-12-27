<?php

namespace App\Http\Controllers\Spa\TodoList;

use App\Http\Controllers\Controller;
use App\Models\SpaTime;
use App\Models\SpaTodoList;

class DeleteController extends Controller
{
    public function __invoke( SpaTodoList $spaTodoList)
    {
        $spaTodoList->delete();
        return  redirect()->route('spa.todolist.index');
    }
}
