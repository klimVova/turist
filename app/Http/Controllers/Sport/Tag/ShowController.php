<?php

namespace App\Http\Controllers\Sport\Tag;

use App\Http\Controllers\Controller;
use App\Models\SportCategory;
use App\Models\SportTag;

class ShowController extends Controller
{
    public function __invoke(SportTag $sportTag)
    {
        return view('sport.tag.show', compact('sportTag'));
    }
}
