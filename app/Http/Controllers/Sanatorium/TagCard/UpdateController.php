<?php

namespace App\Http\Controllers\Sanatorium\TagCard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sanatorium\Category\UpdateRequest;
use App\Models\SanatoriumCardTag;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, SanatoriumCardTag $sanatoriumCardTag)
    {
        $data = $request->validated();
        $sanatoriumCardTag->update($data);
        return view('sanatorium.tagCard.show' , compact('sanatoriumCardTag'));
    }
}
