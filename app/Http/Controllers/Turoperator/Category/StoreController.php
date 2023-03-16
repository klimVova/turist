<?php

namespace App\Http\Controllers\Turoperator\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Turoperator\Category\StoreRequest;
use App\Models\Category;
use App\Models\TuroperatorCategory;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        TuroperatorCategory::firstOrCreate($data);

        return redirect()->route('turoperator.category.index');
    }
}
