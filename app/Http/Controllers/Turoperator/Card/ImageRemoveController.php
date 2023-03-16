<?php

namespace App\Http\Controllers\Turoperator\Card;

use App\Http\Controllers\Controller;
use App\Models\TuroperatorCardImage;

class ImageRemoveController extends Controller
{
    public function __invoke($id)
    {
        TuroperatorCardImage::find($id)->delete();
        return back();
    }
}
