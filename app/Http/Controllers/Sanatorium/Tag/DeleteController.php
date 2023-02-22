<?php

namespace App\Http\Controllers\Sanatorium\Tag;

use App\Http\Controllers\Controller;
use App\Models\SanatoriumTag;

class DeleteController extends Controller
{
    public function __invoke( SanatoriumTag $sanatoriumTag)
    {

        $sanatoriumTag->delete();
        return  redirect()->route('sanatorium.tag.index');
    }
}
