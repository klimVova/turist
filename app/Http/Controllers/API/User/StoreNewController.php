<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Medical\CommentStoreRequest;
use App\Http\Resources\PreOrder\PreOrderResource;
use App\Http\Resources\User\UserResource;
use App\Models\CommentMed;
use App\Models\MedicalCard;
use App\Models\preOrder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use function response;

class StoreNewController extends Controller
{
    public function __invoke(CommentStoreRequest $request)
    {
        $data = $request->validated();
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'email_verified_at' => NULL,
            'password' => Hash::make(  $data['password'] ),
            'city_id' => NUll,
            'republic_id' => NUll,
            'district_id' => NUll,
            'role' => 1,
            'age' => NUll,
            'phone' => NUll,
            'gender' => NUll,
            'user_city' => NUll,
            'user_district' => NUll,
        ]);

        return new UserResource($user);
    }
}
