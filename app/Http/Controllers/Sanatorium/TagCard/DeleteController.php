<?php

namespace App\Http\Controllers\Sanatorium\TagCard;

use App\Http\Controllers\Controller;
use App\Models\SanatoriumCardTag;
use App\Models\SanatoriumTagCard;

class DeleteController extends Controller
{
    public function __invoke( SanatoriumCardTag $sanatoriumCardTag)
    {

        $sanatoriumCardTag->delete();
        return  redirect()->route('sanatorium.tagCard.index');
    }
}
