<?php

namespace App\Http\Controllers\Medical\TodoItem;

use App\Http\Controllers\Controller;
use App\Http\Requests\Medical\TodoItem\UpdateRequest;
use App\Models\MedicalTodoItem;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, MedicalTodoItem $medicalTodoItem)
    {
        $data = $request->validated();
        $medicalTodoItem->update($data);
        return redirect()->route('medical.todolist.index');
    }
}
