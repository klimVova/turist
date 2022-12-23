<?php

namespace App\Http\Controllers\Cafe\Catalog;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        $cafeCatalogs = auth()->user()->cafeCatalogs;
        return view('cafe.catalog.index', compact('cafeCatalogs'));
    }
}
