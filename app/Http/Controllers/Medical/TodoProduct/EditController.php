<?php

namespace App\Http\Controllers\Medical\TodoProduct;

use App\Http\Controllers\Controller;
use App\Models\MedicalTodoProduct;

class EditController extends Controller
{
    public function __invoke(MedicalTodoProduct $medicalTodoProduct)
    {
        return view('medical.todoproduct.edit' , compact('medicalTodoProduct'));
    }
}
