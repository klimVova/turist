<?php

namespace App\Http\Controllers\Admin\District;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\District\StoreRequest;
use App\Models\District;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        District::firstOrCreate($data);

        return redirect()->route('admin.district.index');
    }
}
