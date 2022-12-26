<?php

namespace App\Http\Controllers\Medical\TodoProduct;

use App\Http\Controllers\Controller;
use App\Http\Requests\Medical\TodoProduct\UpdateRequest;
use App\Models\MedicalTodoProduct;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, MedicalTodoProduct $medicalTodoProduct)
    {
        $data = $request->validated();
        $medicalTodoProduct->update($data);
        return redirect()->route('medical.todolist.index');
    }
}
