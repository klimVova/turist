<?php

namespace App\Http\Controllers\Spa\Tag;

use App\Http\Controllers\Controller;
use App\Models\SpaTag;

class IndexController extends Controller
{
    public function __invoke()
    {
        $spaTags =  auth()->user()->spaTags ;
        return view('spa.tag.index', compact('spaTags'));
    }
}
