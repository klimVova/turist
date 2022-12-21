<?php

namespace App\Http\Controllers\Hostel\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Hostel\Category\StoreRequest;
use App\Models\Category;
use App\Models\HostelCategory;
use App\Models\HostelTag;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        HostelTag::firstOrCreate($data);
        return redirect()->route('hostel.tag.index');
    }
}
