<?php

namespace App\Http\Controllers\Hostel\Post;

use App\Http\Controllers\Controller;
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
                $image->move(public_path('storage/hostel_post_images'), $imageName);
                HostelImage::create([
                    'hostel_post_id' => $hostelPost->id,
                    'images' => $imageName
                ]);
            }
        }
        return back();
    }
}
