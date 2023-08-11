<?php

namespace App\Http\Controllers\Admin\ConsultingCat;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\UpdateRequest;
use App\Models\ConsultingCat;
use App\Models\Tag;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, ConsultingCat $consultingCat)
    {
        $data = $request->validated();
        $consultingCat->update($data);
        return view('admin.consultingCat.show' , compact('consultingCat'));
    }
}
