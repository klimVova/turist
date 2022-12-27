<?php

namespace App\Http\Controllers\Spa\Time;

use App\Http\Controllers\Controller;
use App\Http\Requests\Spa\Time\UpdateRequest;
use App\Models\SpaTime;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, SpaTime $spaTime)
    {
        $data = $request->validated();
        $spaTime->update($data);
        return back();
    }
}
