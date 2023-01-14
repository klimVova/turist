<?php

namespace App\Http\Controllers\Cafe\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cafe\Tag\StoreRequest;
use App\Models\CafeTag;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        CafeTag::firstOrCreate($data);
        return redirect()->route('cafe.tag.index');
    }
}
