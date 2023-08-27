<?php

namespace App\Http\Controllers\Client;

use App\Events\PaymentMail;
use App\Http\Controllers\Controller;
use App\Models\HostelCategory;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke()
    {


        if(Auth::user() == null)
            $data = '';
        else
            $data = Auth::user()->id;


        return view('client.main.index', ['data' => $data]);
    }
}
