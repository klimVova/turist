<?php

namespace App\Http\Controllers\Sport\TodoProduct;

use App\Http\Controllers\Controller;
use App\Models\SportTodoProduct;

class EditController extends Controller
{
    public function __invoke(SportTodoProduct $sportTodoProduct)
    {
        return view('sport.todoproduct.edit' , compact('sportTodoProduct'));
    }
}
