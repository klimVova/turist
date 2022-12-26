<?php

namespace App\Http\Controllers\Medical\TodoItem;

use App\Http\Controllers\Controller;
use App\Models\MedicalTodoProduct;

class ProductRemoveController extends Controller
{
    public function __invoke($id){

        MedicalTodoProduct::find($id)->delete();
        return back();
    }
}
