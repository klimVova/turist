<?php

namespace App\Http\Controllers\Sport\Servic;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sport\Servic\UpdateRequest;
use App\Models\SportServic;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, SportServic $sportServic)
    {
        $data = $request->validated();
        $sportServic->update($data);
        return redirect()->route('sport.servic.index');
    }
}
