<?php

namespace App\Http\Controllers\Cafe\Card;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cafe\Card\StoreRequest;
use App\Models\CafeCard;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {

        $data = $request->validated();
        $data['preview_image'] = Storage::disk('public')->put('/cafe_images_card', $data['preview_image']);
        CafeCard::firstOrCreate($data);
        return redirect()->route('cafe.card.index');
    }
}
