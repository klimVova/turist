<?php

namespace App\Http\Controllers\Turoperator\Time;

use App\Http\Controllers\Controller;
use App\Models\TuroperatorTime;

class DeleteController extends Controller
{
    public function __invoke( TuroperatorTime $turoperatorTime)
    {
        $turoperatorTime->delete();
        return  redirect()->route('turoperator.time.index');
    }
}
