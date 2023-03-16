<?php

namespace App\Http\Controllers\Turoperator\Card;

use App\Http\Controllers\Controller;
use App\Models\TuroperatorCard;
use App\Models\TuroperatorCategory;
use App\Models\TuroperatorPost;

class DeleteController extends Controller
{
    public function __invoke( TuroperatorCard $turoperatorCard)
    {
        $turoperatorCard->delete();
        return  redirect()->route('turoperator.card.index');
    }
}
