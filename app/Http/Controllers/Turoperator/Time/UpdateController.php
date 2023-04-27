<?php

namespace App\Http\Controllers\Turoperator\Time;

use App\Http\Controllers\Controller;
use App\Http\Requests\Turoperator\Time\UpdateRequest;
use App\Models\TuroperatorTime;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, TuroperatorTime $turoperatorTime)
    {
        $data = $request->validated();
        $turoperatorTime->update($data);
        return back();
    }
}
