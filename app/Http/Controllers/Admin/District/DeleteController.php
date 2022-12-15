<?php

namespace App\Http\Controllers\Admin\District;

use App\Http\Controllers\Controller;
use App\Models\District;

class DeleteController extends Controller
{
    public function __invoke( District $district)
    {

        $district->delete();
        return  redirect()->route('admin.district.index');
    }
}
