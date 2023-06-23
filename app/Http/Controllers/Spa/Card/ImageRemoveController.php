<?php

namespace App\Http\Controllers\Spa\Card;

use App\Http\Controllers\Controller;
use App\Models\SpaCardImage;

class ImageRemoveController extends Controller
{
    public function __invoke($id)
    {
        SpaCardImage::find($id)->delete();
        return back();
    }
}
