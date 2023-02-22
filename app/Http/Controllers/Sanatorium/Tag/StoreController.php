<?php

namespace App\Http\Controllers\Sanatorium\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sanatorium\Category\StoreRequest;
use App\Models\Category;
use App\Models\SanatoriumCategory;
use App\Models\SanatoriumTag;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        SanatoriumTag::firstOrCreate($data);
        return redirect()->route('sanatorium.tag.index');
    }
}
