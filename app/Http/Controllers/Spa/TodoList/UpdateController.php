<?php

namespace App\Http\Controllers\Spa\TodoList;

use App\Http\Controllers\Controller;
use App\Http\Requests\Spa\TodoList\UpdateRequest;
use App\Models\SpaTodoList;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, SpaTodoList $spaTodoList)
    {
        $data = $request->validated();
        $spaTodoList->update($data);
        return redirect()->route('spa.todolist.index');
    }
}
