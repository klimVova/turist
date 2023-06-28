<?php

namespace App\Http\Controllers\Sport\TagCard;

use App\Http\Controllers\Controller;
use App\Models\SportTagCard;

class IndexController extends Controller
{
    public function __invoke()
    {
        $sportCardTags =  auth()->user()->sportCardTag;
        return view('sport.tagCard.index', compact('sportCardTags'));
    }
}
