<?php

namespace App\Http\Controllers\Cafe\Catalog;

use App\Http\Controllers\Controller;
use App\Models\CafeCatalog;

class DeleteController extends Controller
{
    public function __invoke( CafeCatalog $cafeCatalog)
    {

        $cafeCatalog->delete();
        return  redirect()->route('cafe.catalog.index');
    }
}
