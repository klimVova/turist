<?php

namespace App\Http\Controllers\Cafe\Catalog;

use App\Http\Controllers\Controller;
use App\Models\CafeCatalog;
use App\Models\CafeCategory;

class ShowController extends Controller
{
    public function __invoke(CafeCatalog $cafeCatalog)
    {
        return view('cafe.catalog.show', compact('cafeCatalog'));
    }
}
