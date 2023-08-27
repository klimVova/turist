<?php

namespace App\Listeners;

use App\Events\ConsultingMail;
use App\Mail\Payment\Consulting;
use App\Models\OrdersConsulting;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class NewConsultingEmailNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\ConsultingMail  $event
     * @return void
     */
    public function handle(ConsultingMail $event)
    {
        $user = auth()->user();

        $orders = DB::table('orders_consultings')->where('user_id', '=', $user['id'])->latest()->get();
        $email_status_c = DB::table('orders_consultings')->where('user_id', '=', $user['id'])->pluck('email_status')->last();
        $surname = DB::table('users')->where('id', '=', $user['id'])->pluck('surname')->last();
        $name = DB::table('users')->where('id', '=', $user['id'])->pluck('name')->last();
        $phone = DB::table('users')->where('id', '=', $user['id'])->pluck('phone')->last();
        $time = DB::table('orders_consultings')->where('user_id', '=', $user['id'])->pluck('created_at')->last();
        $email_new = DB::table('users')->where('id', '=', $user['id'])->pluck('email')->last();
        $products_email = DB::table('consulting_posts')->where('user_id', '=', $user['id'])->pluck('user_email')->last();

        $dd = [
            'name' => $orders,
        ];
        if ($email_status_c === NULL) {
            Mail::to($email_new)->send(new Consulting($dd));}
        $orders = OrdersConsulting::orderby('id', 'desc')->first();
        if ($orders) {
            $orders->email_status = 'otpravlen';
            $orders->save();
        }else {
            Mail::fake();
        }

    }
}
