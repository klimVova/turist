<?php

namespace App\Http\Controllers\Sanatorium\Post;

use App\Http\Controllers\Controller;
use App\Models\SanatoriumCategory;
use App\Models\SanatoriumTag;
use http\Env\Request;
use Illuminate\Support\Facades\Auth;

class CreateController extends Controller
{
    public function __invoke()
    {
        $sanatoriumCategories = auth()->user()->sanatoriumCategories;
        $sanatoriumTags =auth()->user()->sanatoriumTags;
        $user = Auth::id();

        return view('sanatorium.post.create', compact('sanatoriumCategories', 'user', 'sanatoriumTags'));
    }
}
