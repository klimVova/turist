<?php

namespace App\Http\Controllers\Admin\Baner;

use App\Http\Controllers\Controller;
use App\Models\Baner;
use App\Models\HostelImage;
use App\Models\Image;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImageRemoveController extends Controller
{
    public function __invoke($id)
    {
        Baner::find($id)->delete();
        return back();
    }
}
