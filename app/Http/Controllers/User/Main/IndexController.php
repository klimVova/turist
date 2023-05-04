<?php

namespace App\Http\Controllers\User\Main;

use App\Http\Controllers\Controller;
use App\Models\preOrder;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function __invoke()
    {
        $user = auth()->user();
        $preOrders=  DB::table('pre_orders')->where('user_id', '=', $user['id'])->get();
        $products = DB::table('pre_orders')->pluck('products');
        $totals = DB::table('pre_orders')->pluck('total_price') ;

//         dd($totals);
        return view('user.main.index', compact('user', 'preOrders', 'products','totals'));
    }
}
