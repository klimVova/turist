<?php

namespace App\Http\Controllers\Sport\TagCard;

use App\Http\Controllers\Controller;
use App\Models\SportCardTag;
use App\Models\SportTagCard;

class DeleteController extends Controller
{
    public function __invoke( SportCardTag $sportCardTag)
    {

        $sportCardTag->delete();
        return  redirect()->route('sport.tagCard.index');
    }
}
