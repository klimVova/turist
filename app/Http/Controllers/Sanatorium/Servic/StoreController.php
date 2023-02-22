<?php

namespace App\Http\Controllers\Sanatorium\Servic;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sanatorium\Servic\StoreRequest;
use App\Models\SanatoriumServic;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {

        $data = $request->validated();
        SanatoriumServic::firstOrCreate($data);
        return redirect()->route('sanatorium.servic.index');
    }
}
