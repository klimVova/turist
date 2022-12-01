<?php

namespace App\Http\Controllers\Hostel\Post;

use App\Http\Controllers\Controller;
use App\Models\HostelCategory;
use App\Models\HostelPost;

class IndexController extends Controller
{
    public function __invoke()
    {
        $hostelPosts = HostelPost::all();
        return view('hostel.post.index', compact('hostelPosts'));
    }
}
