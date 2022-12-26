<?php

namespace App\Http\Controllers\Medical\TodoList;

use App\Http\Controllers\Controller;
use App\Models\MedicalTime;
use App\Models\MedicalTodoList;

class EditController extends Controller
{
    public function __invoke(MedicalTodoList $medicalTodoList)
    {
        return view('medical.todolist.edit' , compact('medicalTodoList'));
    }
}
