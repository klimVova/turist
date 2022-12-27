<?php

namespace App\Http\Controllers\Spa\Card;

use App\Http\Controllers\Controller;
use App\Http\Requests\Spa\Card\UpdateRequest;
use App\Models\SpaCard;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, SpaCard $spaCard)
    {
        $data = $request->validated();
        if (isset($data['preview_image'])) {
            $data['preview_image'] = Storage::disk('public')->put('/spa_images_card', $data['preview_image']);
        }
        $spaCard->update($data);
        return redirect()->route('spa.card.index');
    }
}
