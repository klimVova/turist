<?php

namespace App\Http\Controllers\Medical\TodoList;

use App\Http\Controllers\Controller;
use App\Models\MedicalTime;
use App\Models\MedicalTodoList;

class DeleteController extends Controller
{
    public function __invoke( MedicalTodoList $medicalTodoList)
    {
        $medicalTodoList->delete();
        return  redirect()->route('medical.todolist.index');
    }
}
