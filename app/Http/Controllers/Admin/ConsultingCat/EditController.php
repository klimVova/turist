<?php

namespace App\Http\Controllers\Admin\ConsultingCat;

use App\Http\Controllers\Controller;
use App\Models\ConsultingCat;
use App\Models\Tag;

class EditController extends Controller
{
    public function __invoke(ConsultingCat $consultingCat)
    {
        return view('admin.consultingCat.edit' , compact('consultingCat'));
    }
}
