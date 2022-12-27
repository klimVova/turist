<?php

namespace App\Http\Controllers\Spa\TodoList;

use App\Http\Controllers\Controller;
use App\Http\Requests\Spa\TodoList\StoreRequest;
use App\Models\SpaTime;
use App\Models\SpaTodoList;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {

        $data = $request->validated();
        SpaTodoList::firstOrCreate($data);
        return redirect()->route('spa.todolist.index');
    }
}
