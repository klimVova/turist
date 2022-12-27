<?php

namespace App\Http\Controllers\Spa\Time;

use App\Http\Controllers\Controller;
use App\Models\SpaTime;

class DeleteController extends Controller
{
    public function __invoke( SpaTime $spaTime)
    {
        $spaTime->delete();
        return  redirect()->route('spa.time.index');
    }
}
