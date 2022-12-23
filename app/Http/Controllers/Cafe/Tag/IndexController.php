<?php

namespace App\Http\Controllers\Cafe\Tag;

use App\Http\Controllers\Controller;
use App\Models\HostelTag;

class IndexController extends Controller
{
    public function __invoke()
    {
        $cafeTags =  auth()->user()->cafeTags ;
        return view('cafe.tag.index', compact('cafeTags'));
    }
}
