<?php

namespace App\Http\Controllers\Cafe\TodoProduct;

use App\Http\Controllers\Controller;
use App\Models\CafeTodoProduct;

class EditController extends Controller
{
    public function __invoke(CafeTodoProduct $cafeTodoProduct)
    {
        return view('cafe.todoproduct.edit' , compact('cafeTodoProduct'));
    }
}
