<?php

namespace App\Http\Controllers\Sanatorium\TodoProduct;

use App\Http\Controllers\Controller;
use App\Models\SanatoriumTodoProduct;

class EditController extends Controller
{
    public function __invoke(SanatoriumTodoProduct $sanatoriumTodoProduct)
    {
        return view('sanatorium.todoproduct.edit' , compact('sanatoriumTodoProduct'));
    }
}
