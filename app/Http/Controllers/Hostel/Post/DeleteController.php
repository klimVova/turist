<?php

namespace App\Http\Controllers\Hostel\Post;

use App\Http\Controllers\Controller;
use App\Models\HostelCategory;
use App\Models\HostelPost;

class DeleteController extends Controller
{
    public function __invoke( HostelPost $hostelPost)
    {

        $hostelPost->delete();
        return  redirect()->route('hostel.post.index');
    }
}
