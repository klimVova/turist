<?php

namespace App\Http\Controllers\Cafe\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cafe\Category\UpdateRequest;
use App\Models\CafeCategory;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, CafeCategory $cafeCategory)
    {
        $data = $request->validated();
        $cafeCategory->update($data);
        return view('cafe.categories.show' , compact('cafeCategory'));
    }
}
