<?php

namespace App\Http\Controllers\Sanatorium\TodoProduct;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sanatorium\TodoProduct\UpdateRequest;
use App\Models\SanatoriumTodoProduct;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, SanatoriumTodoProduct $sanatoriumTodoProduct)
    {
        $data = $request->validated();
        $sanatoriumTodoProduct->update($data);
        return redirect()->route('sanatorium.todolist.index');
    }
}
