<?php

namespace App\Http\Controllers\API\Payment;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function __invoke($id)
    {
        $payment = Payment::where('user_id',  $id)->orderBy('id', 'desc')->first();
        $promo = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 8);
        if($payment){
            $payment->status = 1;
            $payment->promocode = $promo;
            $payment->save();
        }
        return response()->json([]);
    }
}
