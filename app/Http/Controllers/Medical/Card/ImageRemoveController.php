<?php

namespace App\Http\Controllers\Medical\Card;

use App\Http\Controllers\Controller;
use App\Models\MedicalCardImage;

class ImageRemoveController extends Controller
{
    public function __invoke($id)
    {
        MedicalCardImage::find($id)->delete();
        return back();
    }
}
