<?php

namespace App\Http\Controllers\Medical\Card;

use App\Http\Controllers\Controller;
use App\Models\MedicalCard;
use App\Models\MedicalCardImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageStoreController extends Controller
{
    public function __invoke(Request $request, MedicalCard $medicalCard)
    {
        if ($request->has('main_image')) {
            foreach ($request->file('main_image') as $image) {
                $imageName = '-main_image-' . time() . rand(1, 1000) . '.' . $image->extension();
                $image->move(public_path('storage/medical_card_images'), $imageName);
                MedicalCardImage::create([
                    'medical_card_id' => $medicalCard->id,
                    'images' => $imageName
                ]);
            }
        }
        return back();
    }
}
