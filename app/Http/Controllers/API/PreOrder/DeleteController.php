<?php

namespace App\Http\Controllers\API\PreOrder;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class DeleteController extends Controller
{
    public function __invoke($id)
    {
        $preOrder = DB::table('pre_orders')->where('id', '=', $id)->delete();
        return response([$id]);
    }
}
