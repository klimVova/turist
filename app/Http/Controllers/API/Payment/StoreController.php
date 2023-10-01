<?php

namespace App\Http\Controllers\API\Payment;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Voronkovich\SberbankAcquiring\Client;
use Voronkovich\SberbankAcquiring\Currency;
use Voronkovich\SberbankAcquiring\HttpClient\HttpClientInterface;

class StoreController extends Controller
{
    public function __invoke($id)
    {
        $client = new Client([
            'userName' => 't7717762693-api',
            'password' => 't7717762693',
            'apiUri' => Client::API_URI_TEST,
            'currency' => Currency::RUB,
            'httpMethod' => HttpClientInterface::METHOD_GET,
        ]);

        $user = DB::table('users')->where('id', '=', $id)->get();

        $totals = DB::table('pre_orders')->where('user_id', '=', $id)->pluck('total_price');

        foreach (array($totals) as $total)
            $a = array_sum(json_decode($total, true));
        $amount = $a * 0.1 * 100;
        foreach ($user as $suka)
            $arr = [
                'email'=> $suka->email,
                'name'=> $suka->name,
                'surname'=> $suka->surname,
                'phone'=> $suka->phone,
            ];

        $email = $arr['email'];
        $name = $arr['name'];
        if ($arr['surname'] === NULL) {
            $arr['surname'] = '';
        }
        $surname = $arr['surname'];
        if ($arr['phone'] === NULL) {
            $arr['phone'] = 'не указан';
        }
        $phone = $arr['phone'];
        $user_id = $id;

        $preOrders = DB::table('pre_orders')->where('user_id', '=', $id)->get();
        foreach ($preOrders as $preOrder)
            $name_product = $preOrder->name_product;
        $organization_email = $preOrder->organization_email;
        $date_product = $preOrder->date;
        $total_price_product = $preOrder->total_price;

        $returnUrl = 'https://www.google.com/';


        $payment = Payment::Create([
            'email' => $email,
            'name' => $name,
            'surname' => $surname,
            'phone' => $phone,
            'user_id' => $user_id,
            'name_product' => $name_product,
            'organization_email' => $organization_email,
            'date_product' => $date_product,
            'total_price_product' => $total_price_product,
            'amount' => $amount,
            'orderId' => $preOrder->id,
            'status' => 0,
            'products' => json_encode($preOrders),
            'promocode' => null,

        ]);

        $data = [
            'email' => $email,
            'name' => $name,
            'surname' => $surname,
            'phone' => $phone,
            'user_id' => $user_id,
            'name_product' => $name_product,
            'organization_email' => $organization_email,
            'date_product' => $date_product,
            'total_price_product' => $total_price_product,
            'amount' => $amount,
        ];

        $response = $client->registerOrder($payment->id, $amount, $returnUrl, $data);

        return $response;
    }
}
