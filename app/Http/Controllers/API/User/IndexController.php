<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\User\IndexRequest;
use App\Http\Resources\Spa\SpaItemResource;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke()
    {
        $users = User::all();
        return  UserResource::collection($users);
    }
}
