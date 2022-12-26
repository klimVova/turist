<?php

namespace App\Http\Controllers\Cafe\TodoList;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cafe\TodoList\UpdateRequest;
use App\Models\CafeTodoList;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, CafeTodoList $cafeTodoList)
    {
        $data = $request->validated();
        $cafeTodoList->update($data);
        return redirect()->route('cafe.todolist.index');
    }
}
