<?php

namespace App\Http\Controllers\Cafe\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cafe\Category\StoreRequest;
use App\Models\CafeTag;
use App\Models\Category;
use App\Models\HostelCategory;
use App\Models\HostelTag;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        CafeTag::firstOrCreate($data);
        return redirect()->route('cafe.tag.index');
    }
}
