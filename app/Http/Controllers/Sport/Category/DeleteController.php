<?php

namespace App\Http\Controllers\Sport\Category;

use App\Http\Controllers\Controller;
use App\Models\SportCategory;

class DeleteController extends Controller
{
    public function __invoke( SportCategory $sportCategory)
    {

        $sportCategory->delete();
        return  redirect()->route('sport.category.index');
    }
}
