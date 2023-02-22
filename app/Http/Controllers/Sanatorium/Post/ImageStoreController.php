<?php

namespace App\Http\Controllers\Sanatorium\Post;

use App\Http\Controllers\Controller;
use App\Models\SanatoriumImage;
use App\Models\SanatoriumPost;
use App\Models\Image;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImageStoreController extends Controller
{
    public function __invoke(Request $request, SanatoriumPost $sanatoriumPost)
    {
        if ($request->has('main_image')) {
            foreach ($request->file('main_image') as $image) {
                $imageName = '-main_image-' . time() . rand(1, 1000) . '.' . $image->extension();
                $image->move(public_path('storage/sanatorium_post_images'), $imageName);
                SanatoriumImage::create([
                    'sanatorium_post_id' => $sanatoriumPost->id,
                    'images' => $imageName
                ]);
            }
        }
        return back();
    }
}
