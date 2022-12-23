<?php

namespace App\Http\Controllers\Cafe\Category;

use App\Http\Controllers\Controller;
use App\Models\CafeCategory;
use App\Models\HostelCategory;
use Illuminate\Http\Request;
use App\Models\Category;

class EditController extends Controller
{
    public function __invoke(CafeCategory $cafeCategory)
    {
        $cafeCatalogs = auth()->user()->cafeCatalogs;
        return view('cafe.categories.edit' , compact('cafeCategory', 'cafeCatalogs'));
    }
}
