<?php

namespace App\Http\Controllers\Sanatorium\TagCard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sanatorium\Category\StoreRequest;
use App\Models\SanatoriumCardTag;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        SanatoriumCardTag::firstOrCreate($data);
        return redirect()->route('sanatorium.tagCard.index');
    }
}
