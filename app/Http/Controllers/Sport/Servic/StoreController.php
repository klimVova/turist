<?php

namespace App\Http\Controllers\Sport\Servic;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sport\Servic\StoreRequest;
use App\Models\SportServic;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {

        $data = $request->validated();
        SportServic::firstOrCreate($data);
        return redirect()->route('sport.servic.index');
    }
}
