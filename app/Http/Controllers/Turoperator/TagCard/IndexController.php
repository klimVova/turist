<?php

namespace App\Http\Controllers\Turoperator\TagCard;

use App\Http\Controllers\Controller;
use App\Models\TuroperatorTagCard;

class IndexController extends Controller
{
    public function __invoke()
    {
        $turoperatorCardTags =  auth()->user()->turoperatorCardTag;
        return view('turoperator.tagCard.index', compact('turoperatorCardTags'));
    }
}
