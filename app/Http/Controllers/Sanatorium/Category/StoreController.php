<?php

namespace App\Http\Controllers\Sanatorium\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sanatorium\Category\StoreRequest;
use App\Models\Category;
use App\Models\SanatoriumCategory;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        SanatoriumCategory::firstOrCreate($data);

        return redirect()->route('sanatorium.category.index');
    }
}
