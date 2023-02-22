<?php

namespace App\Http\Controllers\Sanatorium\Card;

use App\Http\Controllers\Controller;
use App\Models\SanatoriumCardImage;

class ImageRemoveController extends Controller
{
    public function __invoke($id)
    {
        SanatoriumCardImage::find($id)->delete();
        return back();
    }
}
