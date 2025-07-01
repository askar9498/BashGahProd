<?php

namespace App\Http\Controllers\Web\Panel\Admin\TravelFacility;

use App\Enums\RequestStatuses;
use App\Http\Controllers\Controller;
use App\Http\Resources\AdvisoryService\AdvisoryRequestResource;
use App\Http\Resources\TravelFacility\TravelFacilityUseRequestResource;
use App\Models\AdvisoryRequest;
use App\Models\TravelFacilityUseRequest;
use App\Rules\EndAfterStart;
use Auth;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TravelFacilityUseRequestController extends Controller
{
    public function index(): Factory|View|Application
    {
        $travel_facility_use_requests = TravelFacilityUseRequest::query()->orderByDesc('id')->paginate(10);

        return view('panels.admin.travel-facilities.requests')->with(['title' => 'درخواست های استفاده از تسهیلات سفر', 'travel_facility_use_requests' => $travel_facility_use_requests]);
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
                'date',
                new EndAfterStart($request->input('start'))
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
