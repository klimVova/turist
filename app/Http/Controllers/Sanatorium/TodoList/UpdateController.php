<?php

namespace App\Http\Controllers\Sanatorium\TodoList;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sanatorium\TodoList\UpdateRequest;
use App\Models\SanatoriumTodoList;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, SanatoriumTodoList $sanatoriumTodoList)
    {
        $data = $request->validated();
        $sanatoriumTodoList->update($data);
        return redirect()->route('sanatorium.todolist.index');
    }
}
