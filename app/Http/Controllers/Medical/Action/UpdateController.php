<?php

namespace App\Http\Controllers\Medical\Action;

use App\Http\Controllers\Controller;
use App\Http\Requests\Medical\Action\UpdateRequest;
use App\Models\MedicalAction;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, MedicalAction $medicalAction)
    {
        $data = $request->validated();
        $medicalAction->update($data);
        return redirect()->route('medical.action.index');
    }
}
