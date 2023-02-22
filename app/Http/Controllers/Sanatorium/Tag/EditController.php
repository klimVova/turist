<?php

namespace App\Http\Controllers\Sanatorium\Tag;

use App\Http\Controllers\Controller;
use App\Models\SanatoriumCategory;
use App\Models\SanatoriumTag;

class EditController extends Controller
{
    public function __invoke(SanatoriumTag $sanatoriumTag)
    {
        return view('sanatorium.tag.edit' , compact('sanatoriumTag'));
    }
}
