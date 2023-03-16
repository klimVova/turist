<?php

namespace App\Http\Controllers\Turoperator\TodoItem;

use App\Http\Controllers\Controller;
use App\Models\TuroperatorTodoProduct;

class ProductRemoveController extends Controller
{
    public function __invoke($id){

        TuroperatorTodoProduct::find($id)->delete();
        return back();
    }
}
