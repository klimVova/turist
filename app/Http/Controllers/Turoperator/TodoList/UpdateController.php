<?php

namespace App\Http\Controllers\Turoperator\TodoList;

use App\Http\Controllers\Controller;
use App\Http\Requests\Turoperator\TodoList\UpdateRequest;
use App\Models\TuroperatorTodoList;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, TuroperatorTodoList $turoperatorTodoList)
    {
        $data = $request->validated();
        $turoperatorTodoList->update($data);
        return redirect()->route('turoperator.todolist.index');
    }
}
