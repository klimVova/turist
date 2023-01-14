<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserResource;
use App\Models\City;
use App\Models\District;
use App\Models\Republic;
use App\Models\Type;
use App\Models\User;

class FilterListController extends Controller
{
    public function __invoke(User $user)
    {
      $types =Type::all();
      $cities =City::all();
      $republics =Republic::all();
      $districts =District::all();

      $result = [
          'types' =>  $types ,
          'cities' =>  $cities ,
          'republics' =>  $republics ,
          'districts' =>  $districts ,
      ];
      return response()->json($result);
    }
}
