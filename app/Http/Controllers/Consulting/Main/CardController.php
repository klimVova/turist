<?php

namespace App\Http\Controllers\Consulting\Main;

use App\Http\Controllers\Controller;
use App\Models\ConsultingPost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CardController extends Controller
{
    public function __invoke($id)
    {
        $user = Auth::id();

        $items = auth()->user()->cats;
        $lists = DB::table('consulting_cat_users')->where('cat_id', '=', $id)->get();

        $consultingPosts = DB::table('consulting_posts')->where('user_id','=',$user)->where('cat_id', '=',$id)->get();
        $consulting_todo_lists = DB::table('consulting_todo_lists')->where('cat_id','=',$id)->where('user_id','=',$user)->get();
        $services = DB::table('consulting_services')->where('cat_id','=',$id)->where('user_id','=',$user)->get();
        $actions = DB::table('consulting_actions')->where('cat_id','=',$id)->where('user_id','=',$user)->get();

        return view('consulting.card.index', compact('items',
                                                         'lists',
                                                              'id', 'consultingPosts' ,
                                                              'user' , 'consulting_todo_lists' ,'services' ,'actions'));
    }
}
