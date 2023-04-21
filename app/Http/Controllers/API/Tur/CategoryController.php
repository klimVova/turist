<?php

namespace App\Http\Controllers\API\Tur;

use App\Http\Controllers\Controller;
use App\Http\Resources\Tur\TurCategoryResource;
use App\Models\TuroperatorCategory;



class CategoryController extends Controller
{
    public function __invoke()
    {
        $sanatoriumCategory = TuroperatorCategory::all();
        return  TurCategoryResource::collection($sanatoriumCategory);
    }
}
