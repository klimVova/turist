<?php

namespace App\Http\Controllers\User\Main;

use App\Http\Controllers\Controller;
use App\Mail\Payment\Promocode;
use App\Models\Payment;
use App\Models\preOrder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class IndexController extends Controller
{
    public function __invoke()
    {
        $user = auth()->user();
        $preOrders = DB::table('pre_orders')->where('user_id', '=', $user['id'])->get();
        $products = DB::table('pre_orders')->pluck('products');
        $totals = DB::table('pre_orders')->where('user_id', '=', $user['id'])->pluck('total_price');

        $payments = DB::table('payments')->where('user_id', '=', $user['id'])->latest()->get();
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
        if ($promocode != NULL && $promocode_status != 0 ) {
            Mail::to($email)->send(new Promocode($d));
        }
        return view('user.main.index', compact('user', 'preOrders', 'products', 'totals', 'payments'));
    }
}
