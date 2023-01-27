<?php

namespace App\Http\Controllers\Hostel\Action;

use App\Http\Controllers\Controller;
use App\Http\Requests\Hostel\Action\UpdateRequest;
use App\Models\HostelAction;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, HostelAction $hostelAction)
    {
        $data = $request->validated();
        $hostelAction->update($data);
        return redirect()->route('hostel.action.index');
    }
}
