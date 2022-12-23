<?php

namespace App\Http\Controllers\Cafe\Tag;

use App\Http\Controllers\Controller;
use App\Models\CafeTag;
use App\Models\HostelTag;

class DeleteController extends Controller
{
    public function __invoke( CafeTag $cafeTag)
    {

        $cafeTag->delete();
        return  redirect()->route('cafe.tag.index');
    }
}
