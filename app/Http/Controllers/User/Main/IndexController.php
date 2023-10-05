<?php

namespace App\Http\Controllers\User\Main;

use App\Events\ConsultingMail;
use App\Events\PaymentMail;
use App\Http\Controllers\Controller;
use App\Mail\Payment\Consulting;
use App\Mail\Payment\Promocode;
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

        $surname = DB::table('payments')->where('user_id', '=', $user['id'])->pluck('surname')->last();
        $name = DB::table('payments')->where('user_id', '=', $user['id'])->pluck('name')->last();
        $phone = DB::table('payments')->where('user_id', '=', $user['id'])->pluck('phone')->last();
        $time = DB::table('payments')->where('user_id', '=', $user['id'])->pluck('created_at')->last();
        $promocode_status = DB::table('payments')->where('user_id', '=', $user['id'])->pluck('status')->last();
        $promocode = DB::table('payments')->where('user_id', '=', $user['id'])->pluck('promocode')->last();
        $email = DB::table('payments')->where('user_id', '=', $user['id'])->pluck('email')->last();
        $products_email = DB::table('payments')->where('user_id', '=', $user['id'])->pluck('products')->last();
        $amount = DB::table('payments')->where('user_id', '=', $user['id'])->pluck('amount')->last();

        $d=[];
        $message=[];
        $dd=[];
        event(new PaymentMail($d,$message,$dd));


        return view('user.main.index', compact('user', 'preOrders', 'products', 'totals', 'payments', 'promocode_status', 'promocode'));
    }
}

