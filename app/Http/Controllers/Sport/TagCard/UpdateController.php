<?php

namespace App\Http\Controllers\Sport\TagCard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sport\Category\UpdateRequest;
use App\Models\SportCardTag;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, SportCardTag $sportCardTag)
    {
        $data = $request->validated();
        $sportCardTag->update($data);
        return view('sport.tagCard.show' , compact('sportCardTag'));
    }
}
