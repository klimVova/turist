<?php

namespace App\Http\Controllers\Sanatorium\Category;

use App\Http\Controllers\Controller;
use App\Models\SanatoriumCategory;

class DeleteController extends Controller
{
    public function __invoke( SanatoriumCategory $sanatoriumCategory)
    {

        $sanatoriumCategory->delete();
        return  redirect()->route('sanatorium.category.index');
    }
}
