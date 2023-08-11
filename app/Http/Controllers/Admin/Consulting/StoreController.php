<?php

namespace App\Http\Controllers\Admin\Consulting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Consulting\StoreRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        if (isset($data['consultingCats_ids'])) {
            $consultingCats_ids = $data['consultingCats_ids'];
            unset($data['consultingCats_ids']);
        }
        $data['password'] = Hash::make(  $data['password'] );

        $consultingCats = User::firstOrCreate(['email'=>$data['email'] ], $data);

        if (isset($consultingCats_ids)) {
            $consultingCats->cats()->attach($consultingCats_ids);
        }
        return redirect()->route('admin.consulting.index');
    }
}
