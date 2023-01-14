<?php

namespace App\Http\Controllers\Cafe\Tag;

use App\Http\Controllers\Controller;
use App\Models\CafeCategory;
use App\Models\CafeTag;

class ShowController extends Controller
{
    public function __invoke(CafeTag $cafeTag)
    {
        return view('cafe.tag.show', compact('cafeTag'));
    }
}
