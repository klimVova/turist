<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use Voronkovich\SberbankAcquiring\Client;
use Voronkovich\SberbankAcquiring\OrderStatus;

class StatusController extends Controller
{

    public function __invoke($orderId )
    {

        $client = new Client(['userName' => 't7717762693-api', 'password' => 't7717762693']);

        $payment = Payment::all();
        dd($payment);
        $result = $client->getOrderStatusByOwnId($orderId);

        if (OrderStatus::isDeposited($result['orderStatus'])) {
            echo "Order #$orderId is deposited!";
        }

        if (OrderStatus::isDeclined($result['orderStatus'])) {
            echo "Order #$orderId was declined!";
        }
        return  view('user.maim.success');
    }
}
