<?php

namespace App\Http\Controllers\Sport\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sport\Category\UpdateRequest;
use App\Models\SportCategory;
use App\Models\SportTag;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, SportTag $sportTag)
    {
        $data = $request->validated();
        $sportTag->update($data);
        return view('sport.tag.show' , compact('sportTag'));
    }
}
