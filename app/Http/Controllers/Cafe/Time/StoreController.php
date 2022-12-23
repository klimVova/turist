<?php

namespace App\Http\Controllers\Cafe\Time;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cafe\Time\StoreRequest;
use App\Models\CafeTime;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {

        $data = $request->validated();

        CafeTime::firstOrCreate($data);
        return redirect()->route('cafe.time.index');
    }
}
