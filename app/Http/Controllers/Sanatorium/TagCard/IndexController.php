<?php

namespace App\Http\Controllers\Sanatorium\TagCard;

use App\Http\Controllers\Controller;
use App\Models\SanatoriumTagCard;

class IndexController extends Controller
{
    public function __invoke()
    {
        $sanatoriumCardTags =  auth()->user()->sanatoriumCardTag;
        return view('sanatorium.tagCard.index', compact('sanatoriumCardTags'));
    }
}
