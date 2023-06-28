<?php

namespace App\Http\Controllers\Sport\TagCard;

use App\Http\Controllers\Controller;
use App\Models\SportCardTag;
use App\Models\SportCategory;
use App\Models\SportTagCard;

class ShowController extends Controller
{
    public function __invoke(SportCardTag $sportCardTag)
    {
        return view('sport.tagCard.show', compact('sportCardTag'));
    }
}
