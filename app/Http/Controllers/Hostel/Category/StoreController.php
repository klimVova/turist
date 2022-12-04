<?php

namespace App\Http\Controllers\Hostel\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Hostel\Category\StoreRequest;
use App\Models\Category;
use App\Models\HostelCategory;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        HostelCategory::firstOrCreate($data);

        return redirect()->route('hostel.category.index');
    }
}
