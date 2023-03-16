<?php

namespace App\Http\Controllers\Turoperator\Post;

use App\Http\Controllers\Controller;
use App\Models\TuroperatorCategory;
use App\Models\TuroperatorPost;

class IndexController extends Controller
{
    public function __invoke()
    {
        $turoperatorPosts = auth()->user()->turoperatorPosts;
        return view('turoperator.post.index', compact('turoperatorPosts'));
    }
}
