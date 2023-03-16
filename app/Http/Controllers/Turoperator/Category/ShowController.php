<?php

namespace App\Http\Controllers\Turoperator\Category;

use App\Http\Controllers\Controller;
use App\Models\TuroperatorCategory;

class ShowController extends Controller
{
    public function __invoke(TuroperatorCategory $turoperatorCategory)
    {
        return view('turoperator.categories.show', compact('turoperatorCategory'));
    }
}
