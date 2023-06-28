<?php

namespace App\Http\Controllers\Sport\TodoProduct;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sport\TodoProduct\UpdateRequest;
use App\Models\SportTodoProduct;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, SportTodoProduct $sportTodoProduct)
    {
        $data = $request->validated();
        $sportTodoProduct->update($data);
        return redirect()->route('sport.todolist.index');
    }
}
