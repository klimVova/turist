<?php

namespace App\Http\Controllers\Spa\TodoItem;

use App\Http\Controllers\Controller;
use App\Models\SpaTodoProduct;

class ProductRemoveController extends Controller
{
    public function __invoke($id){

        SpaTodoProduct::find($id)->delete();
        return back();
    }
}
