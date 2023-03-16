<?php

namespace App\Http\Controllers\Turoperator\Category;

use App\Http\Controllers\Controller;
use App\Models\TuroperatorCategory;
use Illuminate\Http\Request;
use App\Models\Category;

class EditController extends Controller
{
    public function __invoke(TuroperatorCategory $turoperatorCategory)
    {
        return view('turoperator.categories.edit' , compact('turoperatorCategory'));
    }
}
