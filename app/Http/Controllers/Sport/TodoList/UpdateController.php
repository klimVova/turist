<?php

namespace App\Http\Controllers\Sport\TodoList;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sport\TodoList\UpdateRequest;
use App\Models\SportTodoList;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, SportTodoList $sportTodoList)
    {
        $data = $request->validated();
        $sportTodoList->update($data);
        return redirect()->route('sport.todolist.index');
    }
}
