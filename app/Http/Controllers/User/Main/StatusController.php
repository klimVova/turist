<?php

namespace App\Http\Controllers\User\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Main\UpdateRequest;
use App\Models\Payment;
use App\Models\preOrder;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class StatusController extends Controller
{
    public function __invoke()
    {
        $user = auth()->user();
        $preOrders=  DB::table('pre_orders')->where('user_id', '=', $user['id'])->delete();

        $payment = Payment::where('user_id',  $user['id'])->orderBy('id', 'desc')->first();

        $promo = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 8);

        if($payment){

            $payment->status = 1;
            $payment->promocode = $promo;
            $payment->save();
        }
        return view('user.main.success' );
    }
}
