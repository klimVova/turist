<?php

namespace App\Http\Controllers\Cafe\Catalog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cafe\Catalog\StoreRequest;
use App\Models\CafeCatalog;
use App\Models\CafeCategory;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        CafeCatalog::firstOrCreate($data);

        return redirect()->route('cafe.catalog.index');
    }
}
