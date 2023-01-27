<?php

namespace App\Http\Controllers\Hostel\Card;

use App\Http\Controllers\Controller;
use App\Models\HostelCardImage;

class ImageRemoveController extends Controller
{
    public function __invoke($id)
    {
        HostelCardImage::find($id)->delete();
        return back();
    }
}
