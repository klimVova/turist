<?php

namespace App\Http\Controllers\Turoperator\TagCard;

use App\Http\Controllers\Controller;
use App\Models\TuroperatorCardTag;
use App\Models\TuroperatorCategory;
use App\Models\TuroperatorTagCard;

class EditController extends Controller
{
    public function __invoke(TuroperatorCardTag $turoperatorCardTag)
    {
        return view('turoperator.tagCard.edit' , compact('turoperatorCardTag'));
    }
}
