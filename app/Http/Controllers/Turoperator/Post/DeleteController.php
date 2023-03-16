<?php

namespace App\Http\Controllers\Turoperator\Post;

use App\Http\Controllers\Controller;
use App\Models\TuroperatorCategory;
use App\Models\TuroperatorPost;

class DeleteController extends Controller
{
    public function __invoke( TuroperatorPost $turoperatorPost)
    {

        $turoperatorPost->delete();
        return  redirect()->route('turoperator.post.index');
    }
}
