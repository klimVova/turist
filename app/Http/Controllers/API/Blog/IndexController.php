<?php

namespace App\Http\Controllers\API\Blog;

use App\Http\Controllers\Controller;
use App\Http\Resources\Blog\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Category;

class IndexController extends Controller
{
    public function __invoke()
    {
      $posts = Post::all();
      return PostResource::collection($posts);
    }
}
