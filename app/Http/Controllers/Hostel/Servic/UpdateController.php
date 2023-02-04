<?php

namespace App\Http\Controllers\Hostel\Servic;

use App\Http\Controllers\Controller;
use App\Http\Requests\Hostel\Servic\UpdateRequest;
use App\Models\HostelServic;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, HostelServic $hostelServic)
    {
        $data = $request->validated();
        $hostelServic->update($data);
        return redirect()->route('hostel.servic.index');
    }
}
