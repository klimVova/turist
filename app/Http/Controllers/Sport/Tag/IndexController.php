<?php

namespace App\Http\Controllers\Sport\Tag;

use App\Http\Controllers\Controller;
use App\Models\SportTag;

class IndexController extends Controller
{
    public function __invoke()
    {
        $sportTags =  auth()->user()->sportTags ;
        return view('sport.tag.index', compact('sportTags'));
    }
}
