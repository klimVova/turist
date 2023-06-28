<?php

namespace App\Http\Controllers\Sport\Category;

use App\Http\Controllers\Controller;
use App\Models\SportCategory;
use Illuminate\Http\Request;
use App\Models\Category;

class EditController extends Controller
{
    public function __invoke(SportCategory $sportCategory)
    {
        return view('sport.categories.edit' , compact('sportCategory'));
    }
}
