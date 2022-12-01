<?php

namespace App\Http\Controllers\Hostel\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Hostel\Category\UpdateRequest;
use App\Models\HostelCategory;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, HostelCategory $hostelCategory)
    {
        $data = $request->validated();
        $hostelCategory->update($data);
        return view('hostel.categories.show' , compact('hostelCategory'));
    }
}
