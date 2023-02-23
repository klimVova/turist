<?php

namespace App\Http\Controllers\Sanatorium\TodoItem;

use App\Http\Controllers\Controller;
use App\Models\SanatoriumTodoProduct;

class ProductRemoveController extends Controller
{
    public function __invoke($id){

        SanatoriumTodoProduct::find($id)->delete();
        return back();
    }
}
