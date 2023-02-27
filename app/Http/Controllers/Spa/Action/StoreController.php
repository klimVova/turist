<?php

namespace App\Http\Controllers\Spa\Action;

use App\Http\Controllers\Controller;
use App\Http\Requests\Spa\Action\StoreRequest;
use App\Models\SpaAction;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {

        $data = $request->validated();
        SpaAction::firstOrCreate($data);
        return redirect()->route('spa.action.index');
    }
}
