<?php

namespace App\Http\Controllers\API\Hostel;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Hostel\CommentStoreRequest;
use App\Models\CommentHostel;
use App\Models\HostelCard;
use function response;

class CommentController extends Controller
{
    public function __invoke(CommentStoreRequest $request , HostelCard $hostelCard)
    {
        $data = $request->validated();
        $comment = CommentHostel::create($data);
        return response([]);
    }
}