<?php

namespace App\Http\Controllers\API\Sanatorium;

use App\Http\Controllers\Controller;
use App\Http\Resources\Sanatorium\SanatoriumCategoryResource;
use App\Models\SanatoriumCategory;


class CategoryController extends Controller
{
    public function __invoke()
    {
        $sanatoriumCategory = SanatoriumCategory::all();
        return  SanatoriumCategoryResource::collection($sanatoriumCategory);
    }
}
