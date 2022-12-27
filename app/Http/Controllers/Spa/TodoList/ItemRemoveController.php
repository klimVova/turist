<?php

namespace App\Http\Controllers\Spa\TodoList;

use App\Http\Controllers\Controller;
use App\Models\SpaTodoItem;
use App\Models\SpaTodoList;

class ItemRemoveController extends Controller
{
    public function __invoke($id){

        SpaTodoItem::find($id)->delete();
        return back();
    }
}
