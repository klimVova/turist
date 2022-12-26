<?php

namespace App\Http\Controllers\Medical\Card;

use App\Http\Controllers\Controller;
use App\Http\Requests\Medical\Card\UpdateRequest;
use App\Models\MedicalCard;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, MedicalCard $medicalCard)
    {
        $data = $request->validated();
        if (isset($data['preview_image'])) {
            $data['preview_image'] = Storage::disk('public')->put('/medical_images_card', $data['preview_image']);
        }
        $medicalCard->update($data);
        return redirect()->route('medical.card.index');
    }
}
