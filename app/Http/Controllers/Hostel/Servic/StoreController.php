<?php

namespace App\Http\Controllers\Hostel\Servic;

use App\Http\Controllers\Controller;
use App\Http\Requests\Hostel\Servic\StoreRequest;
use App\Models\HostelServic;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {

        $data = $request->validated();
        HostelServic::firstOrCreate($data);
        return redirect()->route('hostel.servic.index');
    }
}
