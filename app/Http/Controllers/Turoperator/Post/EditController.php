<?php

namespace App\Http\Controllers\Turoperator\Post;

use App\Http\Controllers\Controller;
use App\Models\TuroperatorCategory;
use App\Models\TuroperatorPost;
use App\Models\TuroperatorTag;

class EditController extends Controller
{
    public function __invoke(TuroperatorPost $turoperatorPost)
    {
        $turoperatorCategories = auth()->user()->turoperatorCategories;
        $turoperatorTags =auth()->user()->turoperatorTags;
        return view('turoperator.post.edit' , compact('turoperatorPost', 'turoperatorCategories', 'turoperatorTags'));
    }
}
