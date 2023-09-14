<?php

namespace App\Http\Controllers\API\Payment;

use App\Http\Controllers\Controller;
use App\Http\Resources\Payment\IndexResource;
use App\Models\Payment;


class IndexController extends Controller
{
    public function __invoke()
    {


        $payment= Payment::all();

        return  IndexResource::collection($payment);
    }
}
