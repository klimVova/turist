<?php

namespace App\Http\Controllers\Admin\ConsultingCat;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ConsultingCat;
use App\Models\Tag;

class DeleteController extends Controller
{
    public function __invoke( ConsultingCat $consultingCat)
    {
        $consultingCat->delete();
        return  redirect()->route('admin.consultingCat.index');
    }
}
