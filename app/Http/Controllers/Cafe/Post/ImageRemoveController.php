<?php

namespace App\Http\Controllers\Cafe\Post;

use App\Http\Controllers\Controller;
use App\Models\CafeImage;

class ImageRemoveController extends Controller
{
    public function __invoke($id)
    {
        CafeImage::find($id)->delete();
        return back();
    }
}
