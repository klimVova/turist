<?php

namespace App\Http\Controllers\Turoperator\Tag;

use App\Http\Controllers\Controller;
use App\Models\TuroperatorTag;

class IndexController extends Controller
{
    public function __invoke()
    {
        $turoperatorTags =  auth()->user()->turoperatorTags ;
        return view('turoperator.tag.index', compact('turoperatorTags'));
    }
}
