<?php

namespace App\Http\Controllers\Spa\Tag;

use App\Http\Controllers\Controller;
use App\Models\SpaCategory;
use App\Models\SpaTag;

class EditController extends Controller
{
    public function __invoke(SpaTag $spaTag)
    {
        return view('spa.tag.edit' , compact('spaTag'));
    }
}
