<?php

namespace App\Http\Controllers\Spa\Card;

use App\Http\Controllers\Controller;
use App\Http\Requests\Spa\Card\StoreRequest;
use App\Models\SpaCard;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {

        $data = $request->validated();
        $data['preview_image'] = Storage::disk('public')->put('/spa_images_card', $data['preview_image']);
        SpaCard::firstOrCreate($data);
        return redirect()->route('spa.card.index');
    }
}
