<?php

namespace App\Http\Controllers\Cafe\Catalog;

use App\Http\Controllers\Controller;
use App\Models\CafeCategory;
use App\Models\HostelCategory;
use Illuminate\Http\Request;
use App\Models\Category;

class EditController extends Controller
{
    public function __invoke(CafeCategory $cafeCatalog)
    {
        return view('cafe.catalog.edit' , compact('cafeCatalog'));
    }
}
