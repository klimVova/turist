<?php

namespace App\Http\Controllers\Sanatorium\Category;

use App\Http\Controllers\Controller;
use App\Models\SanatoriumCategory;

class ShowController extends Controller
{
    public function __invoke(SanatoriumCategory $sanatoriumCategory)
    {
        return view('sanatorium.categories.show', compact('sanatoriumCategory'));
    }
}
