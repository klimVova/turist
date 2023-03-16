<?php

namespace App\Http\Controllers\Turoperator\Category;

use App\Http\Controllers\Controller;
use App\Models\TuroperatorCategory;

class DeleteController extends Controller
{
    public function __invoke( TuroperatorCategory $turoperatorCategory)
    {

        $turoperatorCategory->delete();
        return  redirect()->route('turoperator.category.index');
    }
}
