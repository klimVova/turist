<?php

namespace App\Http\Controllers\API\Medical;

use App\Http\Controllers\Controller;
use App\Http\Requests\Medical\Card\CommentStoreRequest;
use App\Models\CommentMed;
use App\Models\MedicalCard;
use function response;

class CommentController extends Controller
{
    public function __invoke(CommentStoreRequest $request , MedicalCard $medicalCard)
    {
        $data = $request->validated();
        $comment = CommentMed::create($data);
        return response([]);
    }
}