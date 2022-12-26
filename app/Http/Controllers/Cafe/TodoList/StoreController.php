<?php

namespace App\Http\Controllers\Cafe\TodoList;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cafe\TodoList\StoreRequest;
use App\Models\CafeTime;
use App\Models\CafeTodoList;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {

        $data = $request->validated();
        CafeTodoList::firstOrCreate($data);
        return redirect()->route('cafe.todolist.index');
    }
}
