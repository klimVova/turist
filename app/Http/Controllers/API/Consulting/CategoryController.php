<?php

namespace App\Http\Controllers\API\Consulting;

use App\Http\Controllers\Controller;
use App\Http\Resources\Consulting\CategoryResource;
use App\Models\CafeAction;
use App\Models\ConsultingCat;


class CategoryController extends Controller
{
    public function __invoke()
    {
        $categories = ConsultingCat::all();
        return  CategoryResource::collection($categories);
    }
}
