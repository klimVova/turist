<?php

namespace App\Http\Controllers\Sport\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sport\Category\StoreRequest;
use App\Models\Category;
use App\Models\SportCategory;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        SportCategory::firstOrCreate($data);

        return redirect()->route('sport.category.index');
    }
}
