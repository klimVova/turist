<?php

namespace App\Http\Controllers\Cafe\Tag;

use App\Http\Controllers\Controller;
use App\Models\CafeTag;
use App\Models\HostelCategory;
use App\Models\HostelTag;

class EditController extends Controller
{
    public function __invoke(CafeTag $cafeTag)
    {
        return view('cafe.tag.edit' , compact('cafeTag'));
    }
}
