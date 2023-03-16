<?php

namespace App\Http\Controllers\Turoperator\Servic;

use App\Http\Controllers\Controller;
use App\Http\Requests\Turoperator\Servic\UpdateRequest;
use App\Models\TuroperatorServic;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, TuroperatorServic $turoperatorServic)
    {
        $data = $request->validated();
        $turoperatorServic->update($data);
        return redirect()->route('turoperator.servic.index');
    }
}
