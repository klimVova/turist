<?php

namespace App\Http\Controllers\Sanatorium\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sanatorium\Category\UpdateRequest;
use App\Models\SanatoriumCategory;
use App\Models\SanatoriumTag;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, SanatoriumTag $sanatoriumTag)
    {
        $data = $request->validated();
        $sanatoriumTag->update($data);
        return view('sanatorium.tag.show' , compact('sanatoriumTag'));
    }
}
