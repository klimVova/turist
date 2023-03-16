<?php

namespace App\Http\Controllers\Turoperator\Post;

use App\Http\Controllers\Controller;
use App\Models\TuroperatorImage;
use App\Models\TuroperatorPost;
use App\Models\Image;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImageStoreController extends Controller
{
    public function __invoke(Request $request, TuroperatorPost $turoperatorPost)
    {
        if ($request->has('main_image')) {
            foreach ($request->file('main_image') as $image) {
                $imageName = '-main_image-' . time() . rand(1, 1000) . '.' . $image->extension();
                $image->move(public_path('storage/turoperator_post_images'), $imageName);
                TuroperatorImage::create([
                    'turoperator_post_id' => $turoperatorPost->id,
                    'images' => $imageName
                ]);
            }
        }
        return back();
    }
}
