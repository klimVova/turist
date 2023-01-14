<?php

namespace App\Http\Controllers\Spa\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Spa\Tag\UpdateRequest;
use App\Models\SpaTag;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, SpaTag $spaTag)
    {
        $data = $request->validated();
        $spaTag->update($data);
        return view('spa.tag.show' , compact('spaTag'));
    }
}
