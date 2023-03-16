<?php

namespace App\Http\Controllers\Turoperator\TodoProduct;

use App\Http\Controllers\Controller;
use App\Http\Requests\Turoperator\TodoProduct\UpdateRequest;
use App\Models\TuroperatorTodoProduct;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, TuroperatorTodoProduct $turoperatorTodoProduct)
    {
        $data = $request->validated();
        $turoperatorTodoProduct->update($data);
        return redirect()->route('turoperator.todolist.index');
    }
}
