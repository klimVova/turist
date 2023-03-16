<?php

namespace App\Http\Controllers\Turoperator\Card;

use App\Http\Controllers\Controller;
use App\Models\TuroperatorCard;
use App\Models\TuroperatorCardImage;
use Illuminate\Http\Request;

class ImageStoreController extends Controller
{
    public function __invoke(Request $request, TuroperatorCard $turoperatorCard)
    {
        if ($request->has('main_image')) {
            foreach ($request->file('main_image') as $image) {
                $imageName = '-main_image-' . time() . rand(1, 1000) . '.' . $image->extension();
                $image->move(public_path('storage/turoperator_card_images'), $imageName);
                TuroperatorCardImage::create([
                    'turoperator_card_id' => $turoperatorCard->id,
                    'images' => $imageName
                ]);
            }
        }
        return back();
    }
}
