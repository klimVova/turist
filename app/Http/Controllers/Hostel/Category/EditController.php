<?php

namespace App\Http\Controllers\Hostel\Category;

use App\Http\Controllers\Controller;
use App\Models\HostelCategory;
use Illuminate\Http\Request;
use App\Models\Category;

class EditController extends Controller
{
    public function __invoke(HostelCategory $hostelCategory)
    {
        return view('hostel.categories.edit' , compact('hostelCategory'));
    }
}
