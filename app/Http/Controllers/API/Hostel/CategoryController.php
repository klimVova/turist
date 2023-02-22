<?php

namespace App\Http\Controllers\API\Hostel;

use App\Http\Controllers\Controller;
use App\Http\Resources\Hostel\HostelCategoryResource;
use App\Models\HostelCategory;


class CategoryController extends Controller
{
    public function __invoke()
    {
        $hostelCategory = HostelCategory::all();
        return  HostelCategoryResource::collection($hostelCategory);
    }
}
