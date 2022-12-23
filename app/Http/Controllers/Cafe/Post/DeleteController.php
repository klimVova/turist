<?php

namespace App\Http\Controllers\Cafe\Post;

use App\Http\Controllers\Controller;
use App\Models\CafePost;

class DeleteController extends Controller
{
    public function __invoke(CafePost $cafePost)
    {

        $cafePost->delete();
        return  redirect()->route('cafe.post.index');
    }
}
