<?php

namespace App\Http\Controllers\Sanatorium\Category;

use App\Http\Controllers\Controller;
use App\Models\SanatoriumCategory;
use Illuminate\Http\Request;
use App\Models\Category;

class EditController extends Controller
{
    public function __invoke(SanatoriumCategory $sanatoriumCategory)
    {
        return view('sanatorium.categories.edit' , compact('sanatoriumCategory'));
    }
}
