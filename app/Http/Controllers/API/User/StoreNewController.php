<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Medical\CommentStoreRequest;
<<<<<<< HEAD
=======
use App\Http\Requests\API\User\NewUserRequest;
use App\Http\Resources\PreOrder\PreOrderResource;
>>>>>>> devs
use App\Http\Resources\User\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class StoreNewController extends Controller
{
    public function __invoke(NewUserRequest $request)
    {
        $data = $request->validated();
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
<<<<<<< HEAD
            'password' => $data['password'],
            'type_id' => $data['type_id'],
            'city_id' => $data['city_id'],
            'republic_id' => $data['republic_id'],
            'district_id' => $data['district_id'],
            'role' => $data['role'],
            'age' => $data['age'],
            'phone' => $data['phone'],
            'gender' => $data['gender'],
            'user_city' => $data['user_city'],
            'user_district' => $data['user_district'],
=======
            'password' => Hash::make(  $data['password'] ),
>>>>>>> devs

        ]);

        return new UserResource($user);
    }
}
