<?php

namespace App\Http\Controllers\Hostel\Category;

use App\Http\Controllers\Controller;
use App\Models\HostelCategory;

class DeleteController extends Controller
{
    public function __invoke( HostelCategory $hostelCategory)
    {

        $hostelCategory->delete();
        return  redirect()->route('hostel.category.index');
    }
}
