<?php

namespace App\Http\Controllers\API\Consulting;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Consulting\OrdersRequest;
use App\Models\OrdersConsulting;
use function response;

class OrdersController extends Controller
{
    public function __invoke(OrdersRequest $request)
    {
        $data = $request->validated();
        $order = OrdersConsulting::create($data);
        return response([]);
    }
}
