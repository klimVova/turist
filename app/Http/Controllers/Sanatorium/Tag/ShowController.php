<?php

namespace App\Http\Controllers\Sanatorium\Tag;

use App\Http\Controllers\Controller;
use App\Models\SanatoriumCategory;
use App\Models\SanatoriumTag;

class ShowController extends Controller
{
    public function __invoke(SanatoriumTag $sanatoriumTag)
    {
        return view('sanatorium.tag.show', compact('sanatoriumTag'));
    }
}
