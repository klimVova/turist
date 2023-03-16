<?php

namespace App\Http\Controllers\Turoperator\Card;

use App\Http\Controllers\Controller;
use App\Models\TuroperatorCard;
use App\Models\TuroperatorCategory;
use App\Models\TuroperatorPost;

class EditController extends Controller
{
    public function __invoke(TuroperatorCard $turoperatorCard)
    {
        $turoperatorCardTags =auth()->user()->turoperatorCardTag;
        return view('turoperator.card.edit' , compact('turoperatorCard','turoperatorCardTags'));
    }
}
