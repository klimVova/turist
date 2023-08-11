<?php

namespace App\Http\Controllers\Consulting\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Consulting\Post\StoreRequest;
use Illuminate\Support\Facades\Auth;


class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        dd($data);
        $user = Auth::id();
        return redirect()->route('consulting.post.index', compact('user'));
    }
}
