<?php

namespace App\Http\Controllers\Sanatorium\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sanatorium\Category\UpdateRequest;
use App\Models\SanatoriumCategory;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, SanatoriumCategory $sanatoriumCategory)
    {
        $data = $request->validated();
        $sanatoriumCategory->update($data);
        return view('sanatorium.categories.show' , compact('sanatoriumCategory'));
    }
}
