<?php

namespace App\Http\Controllers\Hostel\Post;

use App\Http\Controllers\Controller;
use App\Models\HostelCategory;
use App\Models\HostelPost;

class EditController extends Controller
{
    public function __invoke(HostelPost $hostelPost)
    {
        $hostelCategories = HostelCategory::all();
        return view('hostel.post.edit' , compact('hostelPost', 'hostelCategories'));
    }
}
