<?php

namespace App\Http\Controllers\Spa\Card;

use App\Http\Controllers\Controller;
use App\Models\SpaCard;
use App\Models\SpaCardImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageStoreController extends Controller
{
    public function __invoke(Request $request, SpaCard $spaCard)
    {
        if ($request->has('main_image')) {
            foreach ($request->file('main_image') as $image) {
                $imageName = '-main_image-' . time() . rand(1, 1000) . '.' . $image->extension();
                $image->move(public_path('storage/spa_card_images'), $imageName);
                SpaCardImage::create([
                    'spa_card_id' => $spaCard->id,
                    'images' => $imageName
                ]);
            }
        }
        return back();
    }
}
