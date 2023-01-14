<?php

namespace App\Http\Controllers\Spa\Tag;

use App\Http\Controllers\Controller;
use App\Models\SpaTag;

class DeleteController extends Controller
{
    public function __invoke( SpaTag $spaTag)
    {

        $spaTag->delete();
        return  redirect()->route('spa.tag.index');
    }
}
