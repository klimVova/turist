<?php

namespace App\Http\Controllers\Sanatorium\Tag;

use App\Http\Controllers\Controller;
use App\Models\SanatoriumTag;

class IndexController extends Controller
{
    public function __invoke()
    {
        $sanatoriumTags =  auth()->user()->sanatoriumTags ;
        return view('sanatorium.tag.index', compact('sanatoriumTags'));
    }
}
