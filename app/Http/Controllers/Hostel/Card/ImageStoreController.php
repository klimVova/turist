<?php

namespace App\Http\Controllers\Hostel\Card;

use App\Http\Controllers\Controller;
use App\Models\HostelCard;
use App\Models\HostelCardImage;
use Illuminate\Http\Request;

class ImageStoreController extends Controller
{
    public function __invoke(Request $request, HostelCard $hostelCard)
    {
        if ($request->has('main_image')) {
            foreach ($request->file('main_image') as $image) {
                $imageName = '-main_image-' . time() . rand(1, 1000) . '.' . $image->extension();
                $image->move(public_path('storage/hostel_card_images'), $imageName);
                HostelCardImage::create([
                    'hostel_card_id' => $hostelCard->id,
                    'images' => $imageName
                ]);
            }
        }
        return back();
    }
}
