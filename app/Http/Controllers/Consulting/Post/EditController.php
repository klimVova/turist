<?php

namespace App\Http\Controllers\Consulting\Post;

use App\Http\Controllers\Controller;
use App\Models\ConsultingPost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EditController extends Controller
{
    public function __invoke(ConsultingPost $consultingPost)
    {

        $items = auth()->user()->cats;
        $lists = DB::table('consulting_cat_users')->where('cat_id', '=', $consultingPost)->get();

        $user = Auth::id();
        return view('consulting.post.edit' , compact('consultingPost','user' , 'items','lists'));
    }
}
