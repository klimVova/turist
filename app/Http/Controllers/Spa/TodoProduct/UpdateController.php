<?php

namespace App\Http\Controllers\Spa\TodoProduct;

use App\Http\Controllers\Controller;
use App\Http\Requests\Spa\TodoProduct\UpdateRequest;
use App\Models\SpaTodoProduct;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, SpaTodoProduct $spaTodoProduct)
    {
        $data = $request->validated();
        $spaTodoProduct->update($data);
        return redirect()->route('spa.todolist.index');
    }
}
