<?php

namespace App\Http\Controllers\Sport\TodoItem;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sport\TodoItem\UpdateRequest;
use App\Models\SportTodoItem;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, SportTodoItem $sportTodoItem)
    {
        $data = $request->validated();
        $sportTodoItem->update($data);
        return redirect()->route('sport.todolist.index');
    }
}
