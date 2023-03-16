<?php

namespace App\Http\Controllers\Turoperator\TagCard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Turoperator\Category\UpdateRequest;
use App\Models\TuroperatorCardTag;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, TuroperatorCardTag $turoperatorCardTag)
    {
        $data = $request->validated();
        $turoperatorCardTag->update($data);
        return view('turoperator.tagCard.show' , compact('turoperatorCardTag'));
    }
}
