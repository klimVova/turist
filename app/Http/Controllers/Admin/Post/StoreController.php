<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Models\Image;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class StoreController extends BaseController
{

    public function __invoke(StoreRequest $request)
    {

        $data = $request->validated();
        $this->service->store($data,$request);
        return redirect()->route('admin.post.index');
    }
}
