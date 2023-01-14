<?php

namespace App\Http\Controllers\Spa\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Spa\Tag\StoreRequest;
use App\Models\SpaTag;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        SpaTag::firstOrCreate($data);
        return redirect()->route('spa.tag.index');
    }
}
