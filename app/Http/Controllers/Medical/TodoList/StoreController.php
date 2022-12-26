<?php

namespace App\Http\Controllers\Medical\TodoList;

use App\Http\Controllers\Controller;
use App\Http\Requests\Medical\TodoList\StoreRequest;
use App\Models\MedicalTime;
use App\Models\MedicalTodoList;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {

        $data = $request->validated();
        MedicalTodoList::firstOrCreate($data);
        return redirect()->route('medical.todolist.index');
    }
}
