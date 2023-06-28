<?php

namespace App\Http\Controllers\Sport\Category;

use App\Http\Controllers\Controller;
use App\Models\SportCategory;

class IndexController extends Controller
{
    public function __invoke()
    {
        $sportCategories = auth()->user()->sportCategories;
        return view('sport.categories.index', compact('sportCategories'));
    }
}
