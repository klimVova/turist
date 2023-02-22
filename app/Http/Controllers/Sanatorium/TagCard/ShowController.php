<?php

namespace App\Http\Controllers\Sanatorium\TagCard;

use App\Http\Controllers\Controller;
use App\Models\SanatoriumCardTag;
use App\Models\SanatoriumCategory;
use App\Models\SanatoriumTagCard;

class ShowController extends Controller
{
    public function __invoke(SanatoriumCardTag $sanatoriumCardTag)
    {
        return view('sanatorium.tagCard.show', compact('sanatoriumCardTag'));
    }
}
