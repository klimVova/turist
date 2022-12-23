<?php

namespace App\Http\Controllers\Cafe\Time;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cafe\Time\UpdateRequest;
use App\Models\CafeTime;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, CafeTime $cafeTime)
    {
        $data = $request->validated();
        $cafeTime->update($data);
        return back();
    }
}
