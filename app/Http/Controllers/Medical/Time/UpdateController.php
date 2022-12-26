<?php

namespace App\Http\Controllers\Medical\Time;

use App\Http\Controllers\Controller;
use App\Http\Requests\Medical\Time\UpdateRequest;
use App\Models\MedicalTime;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, MedicalTime $medicalTime)
    {
        $data = $request->validated();
        $medicalTime->update($data);
        return back();
    }
}
