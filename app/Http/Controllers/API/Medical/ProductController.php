<?php

namespace App\Http\Controllers\API\Medical;

use App\Http\Controllers\Controller;
use App\Http\Resources\Medical\MedicalProductResource;
use App\Models\MedicalTodoItem;
use App\Models\MedicalTodoProduct;


class ProductController extends Controller
{
    public function __invoke()
    {
        $medicalProduct = MedicalTodoProduct::all();
        return  MedicalProductResource::collection($medicalProduct);
    }
}
