<?php

namespace App\Http\Controllers\Medical\Card;

use App\Http\Controllers\Controller;
use App\Http\Requests\Medical\Card\StoreRequest;
use App\Models\MedicalCard;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {

        $data = $request->validated();
        $data['preview_image'] = Storage::disk('public')->put('/medical_images_card', $data['preview_image']);
        MedicalCard::firstOrCreate($data);
        return redirect()->route('medical.card.index');
    }
}
