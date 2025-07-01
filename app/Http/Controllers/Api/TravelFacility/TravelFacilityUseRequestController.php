<?php

namespace App\Http\Controllers\Api\TravelFacility;

use App\Enums\RequestStatuses;
use App\Http\Controllers\Controller;
use App\Http\Resources\AdvisoryService\AdvisoryRequestResource;
use App\Http\Resources\TravelFacility\TravelFacilityUseRequestResource;
use App\Models\AdvisoryRequest;
use App\Models\TravelFacilityUseRequest;
use App\Rules\EndAfterStart;
use Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TravelFacilityUseRequestController extends Controller
{
    /**
     * @param Request $params
     * @return JsonResponse
     */
    public function index(Request $params): JsonResponse
    {
        $travel_facility_use_requests = TravelFacilityUseRequest::whereUserId(Auth::guard('api')->id());

        if(!empty($params['city_id'])){
            $travel_facility_use_requests = $travel_facility_use_requests->whereCityId($params['city_id']);
        }

        return TravelFacilityUseRequestResource::collection($travel_facility_use_requests->orderByDesc('updated_at')->paginate(10))->response();
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'count' => 'required|numeric',
            'start' => 'required|date',
            'end' => [
                'required',
                'date'
            ],
            'city_id' => 'required|exists:cities,id'
        ]);

        $travel_facility_use_request = new TravelFacilityUseRequest();
        $travel_facility_use_request->count = $request->input('count');
        $travel_facility_use_request->start = $request->input('start');
        $travel_facility_use_request->end = $request->input('end');
        $travel_facility_use_request->city_id = $request->input('city_id');
        $travel_facility_use_request->user_id = Auth::guard('api')->id();
        $travel_facility_use_request->status = RequestStatuses::REQUESTED;

        $travel_facility_use_request->save();

        return new JsonResponse(['travel_facility_use_request' => new TravelFacilityUseRequestResource($travel_facility_use_request)]);
    }

    public function destroy(TravelFacilityUseRequest $travel_facility_use_request): Response
    {
        $travel_facility_use_request->delete();

        return response()->noContent();
    }
}
