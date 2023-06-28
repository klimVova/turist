<?php

namespace App\Http\Controllers\Sport\Post;

use App\Http\Controllers\Controller;
use App\Models\SportCategory;
use App\Models\SportPost;

class IndexController extends Controller
{
    public function __invoke()
    {
        $sportPosts = auth()->user()->sportPosts;
        return view('sport.post.index', compact('sportPosts'));
    }
}
