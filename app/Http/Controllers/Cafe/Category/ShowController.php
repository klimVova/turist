<?php

namespace App\Http\Controllers\Cafe\Category;

use App\Http\Controllers\Controller;
use App\Models\CafeCategory;

class ShowController extends Controller
{
    public function __invoke(CafeCategory $cafeCategory)
    {
        return view('cafe.categories.show', compact('cafeCategory'));
    }
}
