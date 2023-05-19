<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Voronkovich\SberbankAcquiring\Client;
use Voronkovich\SberbankAcquiring\Currency;
use Voronkovich\SberbankAcquiring\HttpClient\HttpClientInterface;

class IndexController extends Controller
{
    public function __invoke()
    {
        $client = new Client([
            'userName' => 't7717762693-api',
            'password' => 't7717762693',
            'apiUri' => Client::API_URI_TEST,
            'currency' => Currency::RUB,
            'httpMethod' => HttpClientInterface::METHOD_GET,
        ]);

        $totals = DB::table('pre_orders')->pluck('total_price') ;
        foreach (array($totals) as $total)
            $a = array_sum(json_decode($total, true));
            $amount = $a * 0.1*100;

        $orderId =  rand(1000, 9999999999999999);

        $user = auth()->user();

        $email = $user['email'];
        $name = $user['name'];
        $surname = $user['surname'];
        $phone = $user['phone'];
        $user_id = $user['id'];

        $preOrders=  DB::table('pre_orders')->where('user_id', '=', $user['id'])->get();
        foreach ($preOrders as $preOrder)
        $name_product =$preOrder->name_product;
        $date_product =$preOrder->date;
        $total_price_product =$preOrder->total_price;

        $returnUrl  = 'http://127.0.0.1:8000/main/user';

        $payment = Payment::Create([
            'email' => $email,
            'name' => $name,
            'surname' => $surname,
            'phone' => $phone,
            'user_id' => $user_id,
            'name_product' =>   $name_product,
            'date_product' =>   $date_product,
            'total_price_product' =>   $total_price_product,
            'amount' => $amount,
            'orderId' => $orderId,
        ]);
        $data = [ 'email' => $email,
            'name' => $name,
            'surname' => $surname,
            'phone' => $phone,
            'user_id' => $user_id,
            'name_product' =>   $name_product,
            'date_product' =>   $date_product,
            'total_price_product' =>   $total_price_product,
            'amount' => $amount,
            'orderId' => $orderId,
            ];

        $response = $client->registerOrder($orderId, $amount, $returnUrl , $data );

        return redirect()->away($response['formUrl']);
    }
}
