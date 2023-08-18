<?php

namespace App\Http\Controllers\Admin\ConsultingCat;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\StoreRequest;
use App\Models\ConsultingCat;
use App\Models\Tag;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        ConsultingCat::firstOrCreate($data);

        return redirect()->route('admin.consultingCat.index');
    }
}
