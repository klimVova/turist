<?php

namespace App\Http\Controllers\Cafe\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Hostel\Category\UpdateRequest;
use App\Models\CafeTag;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, CafeTag $cafeTag)
    {
        $data = $request->validated();
        $cafeTag->update($data);
        return view('cafe.tag.show' , compact('cafeTag'));
    }
}
