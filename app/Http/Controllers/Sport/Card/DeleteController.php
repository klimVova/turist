<?php

namespace App\Http\Controllers\Sport\Card;

use App\Http\Controllers\Controller;
use App\Models\SportCard;
use App\Models\SportCategory;
use App\Models\SportPost;

class DeleteController extends Controller
{
    public function __invoke( SportCard $sportCard)
    {
        $sportCard->delete();
        return  redirect()->route('sport.card.index');
    }
}
