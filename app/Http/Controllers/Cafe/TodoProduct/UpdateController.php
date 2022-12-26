<?php

namespace App\Http\Controllers\Cafe\TodoProduct;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cafe\TodoProduct\UpdateRequest;
use App\Models\CafeTodoProduct;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, CafeTodoProduct $cafeTodoProduct)
    {
        $data = $request->validated();
        $cafeTodoProduct->update($data);
        return redirect()->route('cafe.todolist.index');
    }
}
