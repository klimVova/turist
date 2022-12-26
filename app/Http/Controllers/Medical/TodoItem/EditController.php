<?php

namespace App\Http\Controllers\Medical\TodoItem;

use App\Http\Controllers\Controller;
use App\Models\MedicalCard;
use App\Models\MedicalTodoItem;

class EditController extends Controller
{
    public function __invoke(MedicalTodoItem $medicalTodoItem)
    {
        return view('medical.todoitem.edit' , compact('medicalTodoItem'));
    }
}
