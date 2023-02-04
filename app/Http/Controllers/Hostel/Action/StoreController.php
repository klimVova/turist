<?php

namespace App\Http\Controllers\Hostel\Action;

use App\Http\Controllers\Controller;
use App\Http\Requests\Hostel\Action\StoreRequest;
use App\Models\HostelAction;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {

        $data = $request->validated();
        HostelAction::firstOrCreate($data);
        return redirect()->route('hostel.action.index');
    }
}
