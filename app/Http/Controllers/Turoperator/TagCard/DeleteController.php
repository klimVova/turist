<?php

namespace App\Http\Controllers\Turoperator\TagCard;

use App\Http\Controllers\Controller;
use App\Models\TuroperatorCardTag;
use App\Models\TuroperatorTagCard;

class DeleteController extends Controller
{
    public function __invoke( TuroperatorCardTag $turoperatorCardTag)
    {

        $turoperatorCardTag->delete();
        return  redirect()->route('turoperator.tagCard.index');
    }
}
