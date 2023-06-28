<?php

namespace App\Http\Controllers\Sport\Post;

use App\Http\Controllers\Controller;
use App\Models\SportImage;

class ImageRemoveController extends Controller
{
    public function __invoke($id)
    {
        SportImage::find($id)->delete();
        return back();
    }
}
