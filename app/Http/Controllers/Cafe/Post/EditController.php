<?php

namespace App\Http\Controllers\Cafe\Post;

use App\Http\Controllers\Controller;
use App\Models\CafePost;
use App\Models\HostelCategory;
use App\Models\HostelPost;
use App\Models\HostelTag;

class EditController extends Controller
{
    public function __invoke(CafePost $cafePost)
    {
        $cafeCategories = auth()->user()->cafeCategories;
        $cafeCatalogs = auth()->user()->cafeCatalogs;
        $cafeTags =auth()->user()->cafeTags;
        return view('cafe.post.edit' , compact('cafePost', 'cafeCatalogs', 'cafeCategories', 'cafeTags'));
    }
}
