<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImageStoreController extends BaseController
{
    public function __invoke(Request $request, Post $post)
    {
        if ($request->has('main_image')) {
            foreach ($request->file('main_image') as $image) {
                $imageName = '-main_image-' . time() . rand(1, 1000) . '.' . $image->extension();
                $image->move(public_path('storage/post_images'), $imageName);
                Image::create([
                    'post_id' => $post->id,
                    'images' => $imageName
                ]);
            }
        }
        return back();
    }
}
