<?php

namespace App\Http\Controllers\Medical\Card;

use App\Http\Controllers\Controller;
use App\Http\Requests\Medical\Card\CommentStoreRequest;
use App\Models\CommentMed;
use App\Models\MedicalCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ShowCommentController extends Controller
{
    public function __invoke()
    {

        $comment = CommentMed::all();
        return response($comment);
    }
}
