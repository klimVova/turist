<?php

namespace App\Http\Controllers\Medical\Time;

use App\Http\Controllers\Controller;
use App\Http\Requests\Medical\Time\StoreRequest;
use App\Models\MedicalTime;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {

        $data = $request->validated();

        MedicalTime::firstOrCreate($data);
        return redirect()->route('medical.time.index');
    }
}
