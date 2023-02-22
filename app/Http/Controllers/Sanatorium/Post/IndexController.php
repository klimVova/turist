<?php

namespace App\Http\Controllers\Sanatorium\Post;

use App\Http\Controllers\Controller;
use App\Models\SanatoriumCategory;
use App\Models\SanatoriumPost;

class IndexController extends Controller
{
    public function __invoke()
    {
        $sanatoriumPosts = auth()->user()->sanatoriumPosts;
        return view('sanatorium.post.index', compact('sanatoriumPosts'));
    }
}
