<?php

namespace App\Http\Controllers\Sanatorium\Card;

use App\Http\Controllers\Controller;
use App\Models\SanatoriumCard;
use App\Models\SanatoriumCategory;
use App\Models\SanatoriumPost;

class DeleteController extends Controller
{
    public function __invoke( SanatoriumCard $sanatoriumCard)
    {
        $sanatoriumCard->delete();
        return  redirect()->route('sanatorium.card.index');
    }
}
