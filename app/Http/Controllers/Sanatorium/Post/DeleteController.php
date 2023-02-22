<?php

namespace App\Http\Controllers\Sanatorium\Post;

use App\Http\Controllers\Controller;
use App\Models\SanatoriumCategory;
use App\Models\SanatoriumPost;

class DeleteController extends Controller
{
    public function __invoke( SanatoriumPost $sanatoriumPost)
    {

        $sanatoriumPost->delete();
        return  redirect()->route('sanatorium.post.index');
    }
}
