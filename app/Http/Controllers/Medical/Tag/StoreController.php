<?php

namespace App\Http\Controllers\Medical\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Medical\Tag\StoreRequest;
use App\Models\MedicalTag;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        MedicalTag::firstOrCreate($data);
        return redirect()->route('medical.tag.index');
    }
}
