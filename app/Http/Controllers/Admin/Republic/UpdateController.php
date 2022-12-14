<?php

namespace App\Http\Controllers\Admin\Republic;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\City\UpdateRequest;
use App\Models\Republic;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Republic $republic)
    {
        $data = $request->validated();
        $republic->update($data);
        return view('admin.republic.show' , compact('republic'));
    }
}
