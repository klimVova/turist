<?php

namespace App\Http\Controllers\Consulting\Post;

use App\Http\Controllers\Controller;
use App\Models\HostelCategory;
use App\Models\HostelPost;

class IndexController extends Controller
{
    public function __invoke($id)
    {
        return view('сonsulting.post.index');
    }
}
