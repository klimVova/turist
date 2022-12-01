<?php

namespace App\Http\Controllers\Hostel\Post;

use App\Http\Controllers\Controller;
use App\Models\HostelCategory;

class CreateController extends Controller
{
    public function __invoke()
    {
        $hostelCategories = HostelCategory::all();
        return view('hostel.post.create', compact('hostelCategories'));
    }
}
