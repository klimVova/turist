<?php

namespace App\Http\Controllers\Sanatorium\Card;

use App\Http\Controllers\Controller;
use App\Models\SanatoriumCard;
use App\Models\SanatoriumCategory;
use App\Models\SanatoriumPost;

class EditController extends Controller
{
    public function __invoke(SanatoriumCard $sanatoriumCard)
    {
        $sanatoriumCardTags =auth()->user()->sanatoriumCardTag;
        return view('sanatorium.card.edit' , compact('sanatoriumCard','sanatoriumCardTags'));
    }
}
