<?php

namespace App\Http\Controllers\Cafe\Card;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cafe\Card\UpdateRequest;
use App\Models\CafeCard;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, CafeCard $cafeCard)
    {
        $data = $request->validated();
        if (isset($data['preview_image'])) {
            $data['preview_image'] = Storage::disk('public')->put('/cafe_images_card', $data['preview_image']);
        }
        $cafeCard->update($data);
        return back();
    }
}
