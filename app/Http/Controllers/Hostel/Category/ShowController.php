<?php

namespace App\Http\Controllers\Hostel\Category;

use App\Http\Controllers\Controller;
use App\Models\HostelCategory;

class ShowController extends Controller
{
    public function __invoke(HostelCategory $hostelCategory)
    {
        return view('hostel.categories.show', compact('hostelCategory'));
    }
}
