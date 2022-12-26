<?php

namespace App\Http\Controllers\Cafe\TodoItem;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cafe\TodoItem\UpdateRequest;
use App\Models\CafeTodoItem;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, CafeTodoItem $cafeTodoItem)
    {
        $data = $request->validated();
        $cafeTodoItem->update($data);
        return redirect()->route('cafe.todolist.index');
    }
}
