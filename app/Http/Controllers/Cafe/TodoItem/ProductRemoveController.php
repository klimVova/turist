<?php

namespace App\Http\Controllers\Cafe\TodoItem;

use App\Http\Controllers\Controller;
use App\Models\CafeTodoProduct;

class ProductRemoveController extends Controller
{
    public function __invoke($id){

        CafeTodoProduct::find($id)->delete();
        return back();
    }
}
