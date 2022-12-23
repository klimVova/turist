<?php

namespace App\Http\Controllers\Cafe\Post;

use App\Http\Controllers\Controller;
use App\Models\CafeImage;
use App\Models\CafePost;
use Illuminate\Http\Request;

class ImageStoreController extends Controller
{
    public function __invoke(Request $request, CafePost $cafePost)
    {
        if ($request->has('main_image')) {
            foreach ($request->file('main_image') as $image) {
                $imageName = '-main_image-' . time() . rand(1, 1000) . '.' . $image->extension();
                $image->move(public_path('storage/cafe_post_images'), $imageName);
                CafeImage::create([
                    'cafe_post_id' => $cafePost->id,
                    'images' => $imageName
                ]);
            }
        }
        return back();
    }
}
