<?php

namespace App\Http\Controllers\Sport\TodoItem;

use App\Http\Controllers\Controller;
use App\Models\SportTodoProduct;

class ProductRemoveController extends Controller
{
    public function __invoke($id){

        SportTodoProduct::find($id)->delete();
        return back();
    }
}
