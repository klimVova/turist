<?php

namespace App\Http\Controllers\Turoperator\Action;

use App\Http\Controllers\Controller;
use App\Http\Requests\Turoperator\Action\StoreRequest;
use App\Models\TuroperatorAction;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {

        $data = $request->validated();
        TuroperatorAction::firstOrCreate($data);
        return redirect()->route('turoperator.action.index');
    }
}
