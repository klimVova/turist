<?php

namespace App\Http\Controllers\API\Hostel;

use App\Http\Controllers\Controller;
use App\Http\Filters\HostelFilter;
use App\Http\Requests\API\Hostel\IndexRequest;
use App\Http\Resources\Hostel\HostelResource;
use App\Models\HostelCard;


class IndexController extends Controller
{
    public function __invoke(IndexRequest $request)
    {
        $data = $request->validated();
        $filter = app()->make(HostelFilter::class, ['queryParams' => array_filter($data)]);
        $hostels = HostelCard::filter($filter)->get();
        return HostelResource::collection($hostels);
    }
}
