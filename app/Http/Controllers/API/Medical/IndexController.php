<?php

namespace App\Http\Controllers\API\Medical;

use App\Http\Controllers\Controller;
use App\Http\Filters\MedicalFilter;
use App\Http\Requests\API\Medical\IndexRequest;
use App\Http\Resources\Medical\MedicalResource;
use App\Models\MedicalCard;


class IndexController extends Controller
{
    public function __invoke(IndexRequest $request)
    {
        $data = $request->validated();
        $filter = app()->make(MedicalFilter::class, ['queryParams' => array_filter($data)]);
        $medicals = MedicalCard::filter($filter)->get();
        return MedicalResource::collection($medicals);
    }
}
