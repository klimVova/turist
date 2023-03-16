<?php

namespace App\Http\Controllers\Turoperator\Card;

use App\Http\Controllers\Controller;
use App\Http\Requests\Turoperator\Card\UpdateRequest;
use App\Models\TuroperatorCard;
use App\Models\TuroperatorCategory;
use App\Models\TuroperatorPost;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, TuroperatorCard $turoperatorCard)
    {
        $data = $request->validated();
        if (isset($data['preview_image'])) {
            $data['preview_image'] = Storage::disk('public')->put('/turoperator_images_card', $data['preview_image']);
        }
        if (isset($data['logo'])) {
            $data['logo'] = Storage::disk('public')->put('/turoperator_images_card', $data['logo']);
        }
        if (isset($data['turoperator_cardTag_ids'])) {
            $turoperator_tagIds = $data['turoperator_cardTag_ids'];
            unset($data['turoperator_cardTag_ids']);
        }
        $turoperatorCard->update($data);

        if (isset($turoperator_tagIds)) {
            $turoperatorCard->tags()->sync($turoperator_tagIds);
        }

        return redirect()->route('turoperator.card.index');
    }
}
