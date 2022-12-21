<?php

namespace App\Http\Controllers\Hostel\Category;

use App\Http\Controllers\Controller;
use App\Models\HostelCategory;

class IndexController extends Controller
{
    public function __invoke()
    {
        $hostelCategories = auth()->user()->hostelCategories;
        return view('hostel.categories.index', compact('hostelCategories'));
    }
}
