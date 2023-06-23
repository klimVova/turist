<?php

namespace App\Http\Controllers\Cafe\Card;

use App\Http\Controllers\Controller;
use App\Models\CafeCard;
use App\Models\CafeCardImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageStoreController extends Controller
{
    public function __invoke(Request $request, CafeCard $cafeCard)
    {
        if ($request->has('main_image')) {
            foreach ($request->file('main_image') as $image) {
                $imageName = '-main_image-' . time() . rand(1, 1000) . '.' . $image->extension();
                $image->move(public_path('storage/cafe_card_images'), $imageName);
                CafeCardImage::create([
                    'cafe_card_id' => $cafeCard->id,
                    'images' => $imageName
                ]);
            }
        }
        return back();
    }
}
