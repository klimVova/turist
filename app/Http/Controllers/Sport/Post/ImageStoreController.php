<?php

namespace App\Http\Controllers\Sport\Post;

use App\Http\Controllers\Controller;
use App\Models\SportImage;
use App\Models\SportPost;
use App\Models\Image;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImageStoreController extends Controller
{
    public function __invoke(Request $request, SportPost $sportPost)
    {
        if ($request->has('main_image')) {
            foreach ($request->file('main_image') as $image) {
                $imageName = '-main_image-' . time() . rand(1, 1000) . '.' . $image->extension();
                $image->move(public_path('storage/sport_post_images'), $imageName);
                SportImage::create([
                    'sport_post_id' => $sportPost->id,
                    'images' => $imageName
                ]);
            }
        }
        return back();
    }
}
