<?php

namespace App\Http\Controllers\Spa\TodoProduct;

use App\Http\Controllers\Controller;
use App\Models\SpaTodoProduct;

class EditController extends Controller
{
    public function __invoke(SpaTodoProduct $spaTodoProduct)
    {
        return view('spa.todoproduct.edit' , compact('spaTodoProduct'));
    }
}
