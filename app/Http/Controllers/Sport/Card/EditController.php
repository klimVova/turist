<?php

namespace App\Http\Controllers\Sport\Card;

use App\Http\Controllers\Controller;
use App\Models\SportCard;
use App\Models\SportCategory;
use App\Models\SportPost;

class EditController extends Controller
{
    public function __invoke(SportCard $sportCard)
    {
        $sportCardTags =auth()->user()->sportCardTag;
        return view('sport.card.edit' , compact('sportCard','sportCardTags'));
    }
}
