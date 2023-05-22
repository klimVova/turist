<?php

namespace App\Http\Controllers\User\Main;

use App\Http\Controllers\Controller;
use App\Models\preOrder;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DeleteController extends Controller
{
    public function __invoke(preOrder $preOrder)
    {
        $preOrder->delete();
        $user = auth()->user();
        $preOrders=  DB::table('pre_orders')->where('user_id', '=', $user['id'])->get();
        $totals = DB::table('pre_orders')->where('user_id', '=', $user['id'])->pluck('total_price') ;
        $payments =  DB::table('payments')->where('user_id', '=', $user['id'])->get();
        return view('user.main.index' , compact('user', 'preOrders' , 'totals', 'payments'));
    }
}
