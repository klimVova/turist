<?php

namespace App\Http\Controllers\Sanatorium\Post;

use App\Http\Controllers\Controller;
use App\Models\SanatoriumImage;

class ImageRemoveController extends Controller
{
    public function __invoke($id)
    {
        SanatoriumImage::find($id)->delete();
        return back();
    }
}
