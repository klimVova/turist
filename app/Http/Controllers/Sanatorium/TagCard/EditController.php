<?php

namespace App\Http\Controllers\Sanatorium\TagCard;

use App\Http\Controllers\Controller;
use App\Models\SanatoriumCardTag;
use App\Models\SanatoriumCategory;
use App\Models\SanatoriumTagCard;

class EditController extends Controller
{
    public function __invoke(SanatoriumCardTag $sanatoriumCardTag)
    {
        return view('sanatorium.tagCard.edit' , compact('sanatoriumCardTag'));
    }
}
