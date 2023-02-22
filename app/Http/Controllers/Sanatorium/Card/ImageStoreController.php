<?php

namespace App\Http\Controllers\Sanatorium\Card;

use App\Http\Controllers\Controller;
use App\Models\SanatoriumCard;
use App\Models\SanatoriumCardImage;
use Illuminate\Http\Request;

class ImageStoreController extends Controller
{
    public function __invoke(Request $request, SanatoriumCard $sanatoriumCard)
    {
        if ($request->has('main_image')) {
            foreach ($request->file('main_image') as $image) {
                $imageName = '-main_image-' . time() . rand(1, 1000) . '.' . $image->extension();
                $image->move(public_path('storage/sanatorium_card_images'), $imageName);
                SanatoriumCardImage::create([
                    'sanatorium_card_id' => $sanatoriumCard->id,
                    'images' => $imageName
                ]);
            }
        }
        return back();
    }
}
