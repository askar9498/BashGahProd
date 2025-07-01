<?php

namespace App\Http\Controllers\Api\TravelFacility;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdvisoryService\AdvisoryContractResource;
use App\Http\Resources\TravelFacility\TravelFacilityUseResource;
use App\Models\TravelFacilityUse;
use Auth;
use Illuminate\Http\JsonResponse;

class TravelFacilityUseController extends Controller
{
    public function index(): JsonResponse
    {
        $travel_facility_use = TravelFacilityUse::query()->whereUserId(Auth::guard('api')->id())->orderByDesc('id')->paginate(10);

        return TravelFacilityUseResource::collection($travel_facility_use)->response();
    }
}
