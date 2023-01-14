<?php

namespace App\Http\Controllers\API\Blog;

use App\Http\Controllers\Controller;
use App\Http\Resources\Blog\PostResource;
use App\Models\Post;


class ShowController extends Controller
{
    public function __invoke(Post $post)
    {
        return new PostResource($post);
    }
}
