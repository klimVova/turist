<?php

namespace App\Http\Controllers\Medical\Action;

use App\Http\Controllers\Controller;
use App\Http\Requests\Medical\Action\StoreRequest;
use App\Models\MedicalAction;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {

        $data = $request->validated();
        MedicalAction::firstOrCreate($data);
        return redirect()->route('medical.action.index');
    }
}
