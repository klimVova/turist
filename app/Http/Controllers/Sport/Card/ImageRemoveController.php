<?php

namespace App\Http\Controllers\Sport\Card;

use App\Http\Controllers\Controller;
use App\Models\SportCardImage;

class ImageRemoveController extends Controller
{
    public function __invoke($id)
    {
        SportCardImage::find($id)->delete();
        return back();
    }
}
