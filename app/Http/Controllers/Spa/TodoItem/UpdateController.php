<?php

namespace App\Http\Controllers\Spa\TodoItem;

use App\Http\Controllers\Controller;
use App\Http\Requests\Spa\TodoItem\UpdateRequest;
use App\Models\SpaTodoItem;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, SpaTodoItem $spaTodoItem)
    {
        $data = $request->validated();
        $spaTodoItem->update($data);
        return redirect()->route('spa.todolist.index');
    }
}
