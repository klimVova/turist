<?php

namespace App\Http\Controllers\Turoperator\Tag;

use App\Http\Controllers\Controller;
use App\Models\TuroperatorCategory;
use App\Models\TuroperatorTag;

class EditController extends Controller
{
    public function __invoke(TuroperatorTag $turoperatorTag)
    {
        return view('turoperator.tag.edit' , compact('turoperatorTag'));
    }
}
