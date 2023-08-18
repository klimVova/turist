<?php

namespace App\Http\Controllers\Consulting\Post;

use App\Http\Controllers\Controller;
use App\Models\CafeCard;
use App\Models\ConsultingPost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DeleteController extends Controller
{
    public function __invoke( ConsultingPost $consultingPost)
    {
        $consultingPost->delete();
        $user = Auth::id();

        return to_route('consulting.card.index',['id' => $consultingPost['cat_id']],$status = 302, compact('user'));
    }
}
