<?php

namespace App\Http\Controllers\Cafe\Category;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        $cafeCategories = auth()->user()->cafeCategories;
        return view('cafe.categories.index', compact('cafeCategories'));
    }
}
