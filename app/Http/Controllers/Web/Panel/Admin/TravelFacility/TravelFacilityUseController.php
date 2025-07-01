<?php

namespace App\Http\Controllers\Web\Panel\Admin\TravelFacility;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdvisoryService\AdvisoryContractResource;
use App\Http\Resources\TravelFacility\TravelFacilityUseResource;
use App\Models\TravelFacilityUse;
use Auth;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;

class TravelFacilityUseController extends Controller
{
    public function index(): Factory|View|Application
    {
        $travel_facility_uses = TravelFacilityUse::query()->orderByDesc('id')->paginate(10);

        return view('panels.admin.travel-facilities.uses')->with(['title' =>'گزارش های استفاده از تسهیلات سفر','travel_facility_uses' => $travel_facility_uses]);
    }
}
