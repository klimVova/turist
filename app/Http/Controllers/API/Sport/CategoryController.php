<?php

namespace App\Http\Controllers\API\Sport;

use App\Http\Controllers\Controller;
use App\Http\Resources\Sport\SportCategoryResource;
use App\Models\SportCategory;


class CategoryController extends Controller
{
    public function __invoke()
    {
        $sportCategory = SportCategory::all();
        return  SportCategoryResource::collection($sportCategory);
    }
}
