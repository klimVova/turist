<?php

namespace App\Http\Controllers\Spa\Time;

use App\Http\Controllers\Controller;
use App\Http\Requests\Spa\Time\StoreRequest;
use App\Models\SpaTime;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {

        $data = $request->validated();

        SpaTime::firstOrCreate($data);
        return redirect()->route('spa.time.index');
    }
}
