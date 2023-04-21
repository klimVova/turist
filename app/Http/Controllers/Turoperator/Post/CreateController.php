<?php

namespace App\Http\Controllers\Turoperator\Post;

use App\Http\Controllers\Controller;
use App\Models\TuroperatorCategory;
use App\Models\TuroperatorTag;
use http\Env\Request;
use Illuminate\Support\Facades\Auth;

class CreateController extends Controller
{
    public function __invoke()
    {
        $turoperatorCategories = auth()->user()->turoperatorCategories;
        $turoperatorTags =auth()->user()->turoperatorTags;
        $user = Auth::id();
        return view('turoperator.post.create', compact('turoperatorCategories', 'user', 'turoperatorTags'));
    }
}
