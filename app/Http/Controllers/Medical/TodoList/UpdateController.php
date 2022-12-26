<?php

namespace App\Http\Controllers\Medical\TodoList;

use App\Http\Controllers\Controller;
use App\Http\Requests\Medical\TodoList\UpdateRequest;
use App\Models\MedicalTodoList;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, MedicalTodoList $medicalTodoList)
    {
        $data = $request->validated();
        $medicalTodoList->update($data);
        return redirect()->route('medical.todolist.index');
    }
}
