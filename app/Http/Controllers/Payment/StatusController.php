<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Mail\Payment\Promocode;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

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
            $user = auth()->user();
            $promocode = DB::table('payments')->where('user_id', '=', $user['id'])->pluck('promocode')->last();
            $time = DB::table('payments')->where('user_id', '=', $user['id'])->pluck('created_at')->last();
            $promocode_status = DB::table('payments')->where('user_id', '=', $user['id'])->pluck('status')->last();
            $promocode = DB::table('payments')->where('user_id', '=', $user['id'])->pluck('promocode')->last();
            $email = DB::table('payments')->where('user_id', '=', $user['id'])->pluck('email')->last();
            $products_email = DB::table('payments')->where('user_id', '=', $user['id'])->pluck('products')->last();
            $amount = DB::table('payments')->where('user_id', '=', $user['id'])->pluck('amount')->last();

            $d= [
                'promo' => $promocode,
                'email' => $email,
                'time' => $time,
                'products' => $products_email,
                'amount' => $amount,
            ];
                Mail::to($email)->send(new Promocode($d));

        }
        return response()->json([]);
    }
}
