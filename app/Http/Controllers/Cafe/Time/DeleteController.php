<?php

namespace App\Http\Controllers\Cafe\Time;

use App\Http\Controllers\Controller;
use App\Models\CafeTime;

class DeleteController extends Controller
{
    public function __invoke( CafeTime $cafeTime)
    {
        $cafeTime->delete();
        return  redirect()->route('cafe.time.index');
    }
}
