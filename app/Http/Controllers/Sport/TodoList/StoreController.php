<?php

namespace App\Http\Controllers\Sport\TodoList;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sport\TodoList\StoreRequest;
use App\Models\SportTime;
use App\Models\SportTodoList;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {

        $data = $request->validated();
        SportTodoList::firstOrCreate($data);
        return redirect()->route('sport.todolist.index');
    }
}
