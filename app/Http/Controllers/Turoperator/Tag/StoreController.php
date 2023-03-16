<?php

namespace App\Http\Controllers\Turoperator\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Turoperator\Category\StoreRequest;
use App\Models\Category;
use App\Models\TuroperatorCategory;
use App\Models\TuroperatorTag;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        TuroperatorTag::firstOrCreate($data);
        return redirect()->route('turoperator.tag.index');
    }
}
