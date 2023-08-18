<?php

namespace App\Http\Controllers\Admin\Consulting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Consulting\UpdateRequest;
use App\Models\User;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, User $user)
    {
        $data = $request->validated();

        if (isset($data['consultingCats_ids'])) {
            $consultingCats_ids = $data['consultingCats_ids'];
            unset($data['consultingCats_ids']);
        }
        $user->update($data);

        if (isset($consultingCats_ids)) {
            $user->cats()->sync($consultingCats_ids);
        }


        return  redirect()->route('admin.consulting.index');
//        return view('admin.consulting.show' , compact('user'));
    }
}

