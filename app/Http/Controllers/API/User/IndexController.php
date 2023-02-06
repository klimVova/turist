<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\User\IndexRequest;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke(User $user)
    {
        $this->middleware('auth:sanctum');
        return response([
            'data' => auth('sanctum')->user($user),
        ]);
    }
}
