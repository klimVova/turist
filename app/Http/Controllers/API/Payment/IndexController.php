<?php

namespace App\Http\Controllers\API\Payment;

use App\Http\Controllers\Controller;
use App\Http\Resources\Payment\IndexResource;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;


class IndexController extends Controller
{
    public function __invoke()
    {

        $payment= DB::table('payments')->get();
        return  IndexResource::collection($payment);
    }
}

