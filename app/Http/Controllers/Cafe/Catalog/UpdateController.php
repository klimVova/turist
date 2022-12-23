<?php

namespace App\Http\Controllers\Cafe\Catalog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cafe\Catalog\UpdateRequest;
use App\Models\CafeCatalog;
use App\Models\CafeCategory;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, CafeCatalog $cafeCatalog)
    {
        $data = $request->validated();
        $cafeCatalog->update($data);
        return view('cafe.catalog.show' , compact('cafeCatalog'));
    }
}
