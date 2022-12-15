<?php

namespace App\Http\Controllers\Admin\District;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\District\UpdateRequest;
use App\Models\District;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, District $district)
    {
        $data = $request->validated();
        $district->update($data);
        return view('admin.district.show' , compact('district'));
    }
}
