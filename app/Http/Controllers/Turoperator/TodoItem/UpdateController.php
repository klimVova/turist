<?php

namespace App\Http\Controllers\Turoperator\TodoItem;

use App\Http\Controllers\Controller;
use App\Http\Requests\Turoperator\TodoItem\UpdateRequest;
use App\Models\TuroperatorTodoItem;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, TuroperatorTodoItem $turoperatorTodoItem)
    {
        $data = $request->validated();
        $turoperatorTodoItem->update($data);
        return redirect()->route('turoperator.todolist.index');
    }
}
