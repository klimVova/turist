<?php

namespace App\Http\Controllers\Sanatorium\TodoList;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sanatorium\TodoList\StoreRequest;
use App\Models\SanatoriumTime;
use App\Models\SanatoriumTodoList;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {

        $data = $request->validated();
        SanatoriumTodoList::firstOrCreate($data);
        return redirect()->route('sanatorium.todolist.index');
    }
}
