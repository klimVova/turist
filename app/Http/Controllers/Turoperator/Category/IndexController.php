<?php

namespace App\Http\Controllers\Turoperator\Category;

use App\Http\Controllers\Controller;
use App\Models\TuroperatorCategory;

class IndexController extends Controller
{
    public function __invoke()
    {
        $turoperatorCategories = auth()->user()->turoperatorCategories;
        return view('turoperator.categories.index', compact('turoperatorCategories'));
    }
}
