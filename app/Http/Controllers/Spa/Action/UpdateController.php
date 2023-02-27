<?php

namespace App\Http\Controllers\Spa\Action;

use App\Http\Controllers\Controller;
use App\Http\Requests\Spa\Action\UpdateRequest;
use App\Models\SpaAction;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, SpaAction $spaAction)
    {
        $data = $request->validated();
        $spaAction->update($data);
        return redirect()->route('spa.action.index');
    }
}
