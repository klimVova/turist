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
        if (isset($data['medical_tag_ids'])) {
            $medical_tagIds = $data['medical_tag_ids'];
            unset($data['medical_tag_ids']);
        }
        $data['preview_image'] = Storage::disk('public')->put('/medical_images_card', $data['preview_image']);
        $data['logo'] = Storage::disk('public')->put('/medical_images_card', $data['logo']);
        $medicalCard = MedicalCard::firstOrCreate($data);
        if (isset($medical_tagIds)) {
            $medicalCard->medicalTags()->attach($medical_tagIds);
        }
        return redirect()->route('medical.card.index');
    }
}
