<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Voronkovich\SberbankAcquiring\Client;
use Voronkovich\SberbankAcquiring\OrderStatus;

class StatusController extends Controller
{

    public function __invoke( Request $request)
    {

        $data = $request->all();
        Log::info(json_encode($data));

        $orderId = $data['orderNumber'];
        $status = $data['status'];


        if ($status == 1) {
            $payment = Payment::where('id', $orderId)->first();
            $promo = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 8);
            if($payment){
                $payment->status = 1;
                $payment->promocode = $promo;
                $payment->save();
            }
        }
        return response()->json([]);
    }
}
