<?php

namespace App\Http\Controllers\Admin\ConsultingCat;

use App\Http\Controllers\Controller;
use App\Models\ConsultingCat;
use App\Models\Tag;

class ShowController extends Controller
{
    public function __invoke(ConsultingCat $consultingCat)
    {
        return view('admin.consultingCat.show', compact('consultingCat'));
    }
}
