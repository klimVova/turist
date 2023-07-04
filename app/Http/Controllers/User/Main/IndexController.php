<?php

namespace App\Http\Controllers\User\Main;

use App\Http\Controllers\Controller;
use App\Mail\Payment\Organization;
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
        $surname = DB::table('payments')->where('user_id', '=', $user['id'])->pluck('surname')->last();
        $name = DB::table('payments')->where('user_id', '=', $user['id'])->pluck('name')->last();
        $phone = DB::table('payments')->where('user_id', '=', $user['id'])->pluck('phone')->last();
        $time = DB::table('payments')->where('user_id', '=', $user['id'])->pluck('created_at')->last();
        $promocode_status = DB::table('payments')->where('user_id', '=', $user['id'])->pluck('status')->last();
        $promocode = DB::table('payments')->where('user_id', '=', $user['id'])->pluck('promocode')->last();
        $email = DB::table('payments')->where('user_id', '=', $user['id'])->pluck('email')->last();
        $products_email = DB::table('payments')->where('user_id', '=', $user['id'])->pluck('products')->last();
        $amount = DB::table('payments')->where('user_id', '=', $user['id'])->pluck('amount')->last();

        $d = [
            'promo' => $promocode,
            'email' => $email,
            'time' => $time,
            'products' => $products_email,
            'amount' => $amount,
        ];

        if ($promocode != NULL && $promocode_status != 0) {
            foreach (json_decode($products_email) as $item)
            $k = array();
            for($i = 0; $i < count(json_decode($products_email)); $i++){
                $k[$i] = (json_decode($products_email)[$i]);
                $message = [
                    'promo' => $promocode,
                    'email' => $k[$i]->organization_email,
                    'time' => $time,
                    'products' => $products_email,
                    'amount' => $amount,
                    'surname' => $surname,
                    'name' => $name,
                    'phone' => $phone,
                ];
                if(json_decode($products_email)[$i]->role === 'Мед.центр'){
                    Mail::to($k[$i]->organization_email)->send(new Organization($message));}
                elseif (json_decode($products_email)[$i]->role === 'spa'){
                    Mail::to($k[$i]->organization_email)->send(new Organization($message));}
                elseif (json_decode($products_email)[$i]->role === 'hostel'){
                    Mail::to($k[$i]->organization_email)->send(new Organization($message));}
                elseif (json_decode($products_email)[$i]->role === 'tur'){
                    Mail::to($k[$i]->organization_email)->send(new Organization($message));}
                elseif (json_decode($products_email)[$i]->role === 'sanatorium'){
                    Mail::to($k[$i]->organization_email)->send(new Organization($message));}
                elseif (json_decode($products_email)[$i]->role === 'sport'){
                    Mail::to($k[$i]->organization_email)->send(new Organization($message));}
                elseif (json_decode($products_email)[$i]->role === 'cafe'){
                    Mail::to($k[$i]->organization_email)->send(new Organization($message));}
            }
        }

        if ($promocode != NULL && $promocode_status != 0) {
            Mail::to($email)->send(new Promocode($d));
        }

        return view('user.main.index', compact('user', 'preOrders', 'products', 'totals', 'payments','promocode_status','promocode'));
    }
}

