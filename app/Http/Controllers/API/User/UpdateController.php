<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\User\UpdateRequest;
use App\Http\Requests\API\User\UpUserRequest;
use App\Http\Resources\User\UserResource;
use App\Models\User;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, User $person)
    {
        $data =(array) $request->validated();
        $person->update($data);

        return  $person;
    }
}
