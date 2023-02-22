<?php

namespace App\Http\Controllers\Sanatorium\Post;

use App\Http\Controllers\Controller;
use App\Models\SanatoriumCategory;
use App\Models\SanatoriumPost;
use App\Models\SanatoriumTag;

class EditController extends Controller
{
    public function __invoke(SanatoriumPost $sanatoriumPost)
    {
        $sanatoriumCategories = auth()->user()->sanatoriumCategories;
        $sanatoriumTags =auth()->user()->sanatoriumTags;
        return view('sanatorium.post.edit' , compact('sanatoriumPost', 'sanatoriumCategories', 'sanatoriumTags'));
    }
}
