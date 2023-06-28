<?php

namespace App\Http\Controllers\Sport\Post;

use App\Http\Controllers\Controller;
use App\Models\SportCategory;
use App\Models\SportTag;
use http\Env\Request;
use Illuminate\Support\Facades\Auth;

class CreateController extends Controller
{
    public function __invoke()
    {
        $sportCategories = auth()->user()->sportCategories;
        $sportTags =auth()->user()->sportTags;
        $user = Auth::id();

        return view('sport.post.create', compact('sportCategories', 'user', 'sportTags'));
    }
}
