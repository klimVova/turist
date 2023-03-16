<?php

namespace App\Http\Controllers\Turoperator\TagCard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Turoperator\Category\StoreRequest;
use App\Models\TuroperatorCardTag;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        TuroperatorCardTag::firstOrCreate($data);
        return redirect()->route('turoperator.tagCard.index');
    }
}
