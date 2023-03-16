<?php

namespace App\Http\Controllers\Turoperator\Tag;

use App\Http\Controllers\Controller;
use App\Models\TuroperatorTag;

class DeleteController extends Controller
{
    public function __invoke( TuroperatorTag $turoperatorTag)
    {

        $turoperatorTag->delete();
        return  redirect()->route('turoperator.tag.index');
    }
}
