<?php

namespace App\Http\Controllers\Turoperator\Time;

use App\Http\Controllers\Controller;
use App\Http\Requests\Turoperator\Time\StoreRequest;
use App\Models\TuroperatorTime;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {

        $data = $request->validated();

        TuroperatorTime::firstOrCreate($data);
        return redirect()->route('turoperator.time.index');
    }
}
