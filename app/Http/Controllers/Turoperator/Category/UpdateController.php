<?php

namespace App\Http\Controllers\Turoperator\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Turoperator\Category\UpdateRequest;
use App\Models\TuroperatorCategory;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, TuroperatorCategory $turoperatorCategory)
    {
        $data = $request->validated();
        $turoperatorCategory->update($data);
        return view('turoperator.categories.show' , compact('turoperatorCategory'));
    }
}
