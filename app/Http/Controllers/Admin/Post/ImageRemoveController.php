<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImageRemoveController extends BaseController
{
    public function __invoke($id)
    {
        Image::find($id)->delete();
        return back();
    }
}
