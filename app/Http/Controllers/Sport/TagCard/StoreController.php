<?php

namespace App\Http\Controllers\Sport\TagCard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sport\Category\StoreRequest;
use App\Models\SportCardTag;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        SportCardTag::firstOrCreate($data);
        return redirect()->route('sport.tagCard.index');
    }
}
