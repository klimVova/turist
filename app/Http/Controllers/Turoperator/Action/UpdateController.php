<?php

namespace App\Http\Controllers\Turoperator\Action;

use App\Http\Controllers\Controller;
use App\Http\Requests\Turoperator\Action\UpdateRequest;
use App\Models\TuroperatorAction;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, TuroperatorAction $turoperatorAction)
    {
        $data = $request->validated();
        $turoperatorAction->update($data);
        return redirect()->route('turoperator.action.index');
    }
}
