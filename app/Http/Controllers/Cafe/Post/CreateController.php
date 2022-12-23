<?php

namespace App\Http\Controllers\Cafe\Post;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CreateController extends Controller
{
    public function __invoke()
    {
        $cafeCategories = auth()->user()->cafeCategories;
        $cafeCatalogs = auth()->user()->cafeCatalogs;
        $cafeTags =auth()->user()->cafeTags;
        $user = Auth::id();

        return view('cafe.post.create', compact('cafeCategories','cafeCatalogs', 'user', 'cafeTags'));
    }
}
