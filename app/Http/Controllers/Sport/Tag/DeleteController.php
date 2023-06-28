<?php

namespace App\Http\Controllers\Sport\Tag;

use App\Http\Controllers\Controller;
use App\Models\SportTag;

class DeleteController extends Controller
{
    public function __invoke( SportTag $sportTag)
    {

        $sportTag->delete();
        return  redirect()->route('sport.tag.index');
    }
}
