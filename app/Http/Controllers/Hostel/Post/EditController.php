<?php

namespace App\Http\Controllers\Hostel\Post;

use App\Http\Controllers\Controller;
use App\Models\HostelCategory;
use App\Models\HostelPost;
use App\Models\HostelTag;

class EditController extends Controller
{
    public function __invoke(HostelPost $hostelPost)
    {

        $hostelCategories = auth()->user()->hostelCategories;
        $hostelTags =auth()->user()->hostelTags;
        return view('hostel.post.edit' , compact('hostelPost', 'hostelCategories', 'hostelTags'));
    }
}
