<?php

namespace App\Http\Controllers\Cafe\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cafe\Category\StoreRequest;
use App\Models\CafeCategory;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        CafeCategory::firstOrCreate($data);

        return redirect()->route('cafe.category.index');
    }
}
