<?php

namespace App\Http\Controllers\Turoperator\Servic;

use App\Http\Controllers\Controller;
use App\Http\Requests\Turoperator\Servic\StoreRequest;
use App\Models\TuroperatorServic;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {

        $data = $request->validated();
        TuroperatorServic::firstOrCreate($data);
        return redirect()->route('turoperator.servic.index');
    }
}
