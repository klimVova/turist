<?php

namespace App\Http\Controllers\Admin\Republic;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Republic;

class DeleteController extends Controller
{
    public function __invoke( Republic $republic)
    {

        $republic->delete();
        return  redirect()->route('admin.republic.index');
    }
}
