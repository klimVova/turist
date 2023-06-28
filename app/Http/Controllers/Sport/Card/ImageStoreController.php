<?php

namespace App\Http\Controllers\Sport\Card;

use App\Http\Controllers\Controller;
use App\Models\SportCard;
use App\Models\SportCardImage;
use Illuminate\Http\Request;

class ImageStoreController extends Controller
{
    public function __invoke(Request $request, SportCard $sportCard)
    {
        if ($request->has('main_image')) {
            foreach ($request->file('main_image') as $image) {
                $imageName = '-main_image-' . time() . rand(1, 1000) . '.' . $image->extension();
                $image->move(public_path('storage/sport_card_images'), $imageName);
                SportCardImage::create([
                    'sport_card_id' => $sportCard->id,
                    'images' => $imageName
                ]);
            }
        }
        return back();
    }
}
