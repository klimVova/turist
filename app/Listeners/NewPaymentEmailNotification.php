<?php

namespace App\Listeners;

use App\Events\PaymentMail;
use App\Mail\Payment\Consulting;
use App\Mail\Payment\Organization;
use App\Mail\Payment\Promocode;
use App\Models\OrdersConsulting;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class NewPaymentEmailNotification
{

    public function __construct()
    {
        //
    }

    public function handle(PaymentMail $payment)
    {

        $user = auth()->user();
        if ($user) {
            $payments = DB::table('payments')->where('user_id', '=', $user['id'])->latest()->get();
            $surname = DB::table('payments')->where('user_id', '=', $user['id'])->pluck('surname')->last();
            $name = DB::table('payments')->where('user_id', '=', $user['id'])->pluck('name')->last();
            $phone = DB::table('payments')->where('user_id', '=', $user['id'])->pluck('phone')->last();
            $time = DB::table('payments')->where('user_id', '=', $user['id'])->pluck('created_at')->last();
            $promocode_status = DB::table('payments')->where('user_id', '=', $user['id'])->pluck('status')->last();
            $email_status = DB::table('payments')->where('user_id', '=', $user['id'])->pluck('email_status')->last();
            $promocode = DB::table('payments')->where('user_id', '=', $user['id'])->pluck('promocode')->last();
            $email = DB::table('payments')->where('user_id', '=', $user['id'])->pluck('email')->last();
            $products_email = DB::table('payments')->where('user_id', '=', $user['id'])->pluck('products')->last();
            $amount = DB::table('payments')->where('user_id', '=', $user['id'])->pluck('amount')->last();

            $orders = DB::table('orders_consultings')->where('user_id', '=', $user['id'])->latest()->get();
            $email_status_c = DB::table('orders_consultings')->where('user_id', '=', $user['id'])->pluck('email_status')->last();
            $message_c = DB::table('orders_consultings')->where('user_id', '=', $user['id'])->pluck('messages')->last();
            $surname_c = DB::table('users')->where('id', '=', $user['id'])->pluck('surname')->last();
            $name_c = DB::table('orders_consultings')->where('user_id', '=', $user['id'])->pluck('company_name')->last();
            $phone_c = DB::table('users')->where('id', '=', $user['id'])->pluck('phone')->last();
            $time_c = DB::table('orders_consultings')->where('user_id', '=', $user['id'])->pluck('created_at')->last();
            $email_new_c = DB::table('users')->where('id', '=', $user['id'])->pluck('email')->last();
            $ids = DB::table('orders_consultings')->where('user_id', '=', $user['id'])->pluck('card_id')->last();
            $test_email = DB::table('consulting_posts')->where('id', '=', $ids)->pluck('user_email')->last();


            $dd = [
                'name' => $name_c,
                'time' => $time_c,
                'messages' => $message_c,
                'phone' => $phone_c,
                'email' =>  $email_new_c,
            ];
            if ($email_status_c === NULL && $test_email !='') {
                Mail::to($test_email)->send(new Consulting($dd));
            }
            $orders = OrdersConsulting::orderby('id', 'desc')->first();
            if ($orders) {
                $orders->email_status = 'otpravlen';
                $orders->save();
            } else {
                Mail::fake();
            }

            $d = [
                'promo' => $promocode,
                'email' => $email,
                'time' => $time,
                'products' => $products_email,
                'amount' => $amount,
            ];
            if ($promocode != NULL && $promocode_status != 0) {
                if ($email_status === NULL) {
                    Mail::to($email)->send(new Promocode($d));
                    foreach (json_decode($products_email) as $item)
                        $k = array();
                    for ($i = 0; $i < count(json_decode($products_email)); $i++) {
                        $k[$i] = (json_decode($products_email)[$i]);
                        if (isset($k[$i]->organization_email)) {
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
                        }
                        if (isset($k[$i]->organization_email) && json_decode($products_email)[$i]->role === 'Мед.центр') {
                            Mail::to($k[$i]->organization_email)->send(new Organization($message));
                        } elseif (isset($k[$i]->organization_email) && json_decode($products_email)[$i]->role === 'spa') {
                            Mail::to($k[$i]->organization_email)->send(new Organization($message));
                        } elseif (isset($k[$i]->organization_email) && json_decode($products_email)[$i]->role === 'hostel') {
                            Mail::to($k[$i]->organization_email)->send(new Organization($message));
                        } elseif (isset($k[$i]->organization_email) && json_decode($products_email)[$i]->role === 'tur') {
                            Mail::to($k[$i]->organization_email)->send(new Organization($message));
                        } elseif (isset($k[$i]->organization_email) && json_decode($products_email)[$i]->role === 'sanatorium') {
                            Mail::to($k[$i]->organization_email)->send(new Organization($message));
                        } elseif (isset($k[$i]->organization_email) && json_decode($products_email)[$i]->role === 'sport') {
                            Mail::to($k[$i]->organization_email)->send(new Organization($message));
                        } elseif (isset($k[$i]->organization_email) && json_decode($products_email)[$i]->role === 'cafe') {
                            Mail::to($k[$i]->organization_email)->send(new Organization($message));
                        }
                    }
                    $payment = Payment::orderby('id', 'desc')->first();
                    if ($payment) {
                        $payment->email_status = 'otpravlen';
                        $payment->save();
                    }
                } else {
                    Mail::fake();
                }
            }
        }
    }
}
