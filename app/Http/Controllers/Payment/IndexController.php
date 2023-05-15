<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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

        $response = $client->registerOrder($orderId, $amount, 'http://mycoolshop.local/payment-success', []);
//        dd($response , $client);
        return redirect()->away($response['formUrl']);
    }
}
