<?php

namespace App\Http\Controllers\Cafe\Card;

use App\Http\Controllers\Controller;
use App\Models\CafeCardImage;

class ImageRemoveController extends Controller
{
    public function __invoke($id)
    {
        CafeCardImage::find($id)->delete();
        return back();
    }
}
