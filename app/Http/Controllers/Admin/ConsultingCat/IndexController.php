<?php

namespace App\Http\Controllers\Admin\ConsultingCat;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ConsultingCat;
use App\Models\Tag;

class IndexController extends Controller
{
    public function __invoke()
    {
        $consultingCats = ConsultingCat::all();
        return view('admin.consultingCat.index', compact('consultingCats'));
    }
}
