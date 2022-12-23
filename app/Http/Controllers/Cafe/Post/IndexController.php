<?php

namespace App\Http\Controllers\Cafe\Post;

use App\Http\Controllers\Controller;
use App\Models\HostelCategory;
use App\Models\HostelPost;

class IndexController extends Controller
{
    public function __invoke()
    {
        $cafePosts = auth()->user()->cafePosts;
        return view('cafe.post.index', compact('cafePosts'));
    }
}
