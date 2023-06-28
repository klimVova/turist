<?php

namespace App\Http\Controllers\Sport\Post;

use App\Http\Controllers\Controller;
use App\Models\SportCategory;
use App\Models\SportPost;

class DeleteController extends Controller
{
    public function __invoke( SportPost $sportPost)
    {

        $sportPost->delete();
        return  redirect()->route('sport.post.index');
    }
}
