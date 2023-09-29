<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\User\UpUserRequest;
use App\Http\Resources\User\UserResource;
use App\Http\Resources\User\UserUpResource;
use App\Models\User;

class UpUserController extends Controller
{
    public function __invoke(UpUserRequest $request, User $user)
    {
        $data = $request->validated();
        $user->update($data);
<<<<<<< HEAD
        return  UserResource::collection($user);
=======
        return new UserUpResource($user);
>>>>>>> devs
    }
}
