<?php

namespace App\Http\Controllers\Turoperator\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Turoperator\Category\UpdateRequest;
use App\Models\TuroperatorCategory;
use App\Models\TuroperatorTag;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, TuroperatorTag $turoperatorTag)
    {
        $data = $request->validated();
        $turoperatorTag->update($data);
        return view('turoperator.tag.show' , compact('turoperatorTag'));
    }
}
