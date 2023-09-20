<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Medical\CommentStoreRequest;
use App\Http\Requests\API\User\NewUserRequest;
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
    public function __invoke(NewUserRequest $request)
    {
        $data = $request->validated();
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make(  $data['password'] ),

        ]);

        return new UserResource($user);
    }
}
