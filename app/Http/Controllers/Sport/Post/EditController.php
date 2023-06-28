<?php

namespace App\Http\Controllers\Sport\Post;

use App\Http\Controllers\Controller;
use App\Models\SportCategory;
use App\Models\SportPost;
use App\Models\SportTag;

class EditController extends Controller
{
    public function __invoke(SportPost $sportPost)
    {
        $sportCategories = auth()->user()->sportCategories;
        $sportTags =auth()->user()->sportTags;
        return view('sport.post.edit' , compact('sportPost', 'sportCategories', 'sportTags'));
    }
}
