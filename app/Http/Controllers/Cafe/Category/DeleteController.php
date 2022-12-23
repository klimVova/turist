<?php

namespace App\Http\Controllers\Cafe\Category;

use App\Http\Controllers\Controller;
use App\Models\CafeCategory;

class DeleteController extends Controller
{
    public function __invoke( CafeCategory $cafeCategory)
    {

        $cafeCategory->delete();
        return  redirect()->route('cafe.category.index');
    }
}
