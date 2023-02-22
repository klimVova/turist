<?php

namespace App\Http\Controllers\Sanatorium\Category;

use App\Http\Controllers\Controller;
use App\Models\SanatoriumCategory;

class IndexController extends Controller
{
    public function __invoke()
    {
        $sanatoriumCategories = auth()->user()->sanatoriumCategories;
        return view('sanatorium.categories.index', compact('sanatoriumCategories'));
    }
}
