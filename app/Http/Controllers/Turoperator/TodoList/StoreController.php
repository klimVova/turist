<?php

namespace App\Http\Controllers\Turoperator\TodoList;

use App\Http\Controllers\Controller;
use App\Http\Requests\Turoperator\TodoList\StoreRequest;
use App\Models\TuroperatorTime;
use App\Models\TuroperatorTodoList;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {

        $data = $request->validated();
        TuroperatorTodoList::firstOrCreate($data);
        return redirect()->route('turoperator.todolist.index');
    }
}
