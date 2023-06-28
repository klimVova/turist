<?php

namespace App\Http\Controllers\Sport\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sport\Category\UpdateRequest;
use App\Models\SportCategory;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, SportCategory $sportCategory)
    {
        $data = $request->validated();
        $sportCategory->update($data);
        return view('sport.categories.show' , compact('sportCategory'));
    }
}
