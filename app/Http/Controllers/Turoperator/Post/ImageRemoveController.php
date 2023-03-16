<?php

namespace App\Http\Controllers\Turoperator\Post;

use App\Http\Controllers\Controller;
use App\Models\TuroperatorImage;

class ImageRemoveController extends Controller
{
    public function __invoke($id)
    {
        TuroperatorImage::find($id)->delete();
        return back();
    }
}
