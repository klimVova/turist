<?php

namespace App\Http\Controllers\Admin\Baner;

use App\Http\Controllers\Controller;
use App\Models\Baner;
use App\Models\HostelImage;
use App\Models\HostelPost;
use App\Models\Image;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImageStoreController extends Controller
{
    public function __invoke(Request $request, HostelPost $hostelPost)
    {
        if ($request->has('main_image')) {
            foreach ($request->file('main_image') as $image) {
                $imageName = '-main_image-' . time() . rand(1, 1000) . '.' . $image->extension();
                $image->move(public_path('storage/baners_images'), $imageName);
                Baner::create([
                    'images' => $imageName
                ]);
            }
        }
        return back();
    }
}
