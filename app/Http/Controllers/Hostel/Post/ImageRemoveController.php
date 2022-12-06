<?php

namespace App\Http\Controllers\Hostel\Post;

use App\Http\Controllers\Controller;
use App\Models\HostelImage;
use App\Models\Image;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImageRemoveController extends Controller
{
    public function __invoke($id)
    {
        HostelImage::find($id)->delete();
        return back();
    }
}
