<?php

namespace App\Http\Controllers\Turoperator\TodoProduct;

use App\Http\Controllers\Controller;
use App\Models\TuroperatorTodoProduct;

class EditController extends Controller
{
    public function __invoke(TuroperatorTodoProduct $turoperatorTodoProduct)
    {
        return view('turoperator.todoproduct.edit' , compact('turoperatorTodoProduct'));
    }
}
