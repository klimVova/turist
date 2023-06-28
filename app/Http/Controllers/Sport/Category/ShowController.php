<?php

namespace App\Http\Controllers\Sport\Category;

use App\Http\Controllers\Controller;
use App\Models\SportCategory;

class ShowController extends Controller
{
    public function __invoke(SportCategory $sportCategory)
    {
        return view('sport.categories.show', compact('sportCategory'));
    }
}
