<?php

namespace App\Http\Controllers\Sanatorium\TodoItem;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sanatorium\TodoItem\UpdateRequest;
use App\Models\SanatoriumTodoItem;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, SanatoriumTodoItem $sanatoriumTodoItem)
    {
        $data = $request->validated();
        $sanatoriumTodoItem->update($data);
        return redirect()->route('sanatorium.todolist.index');
    }
}
