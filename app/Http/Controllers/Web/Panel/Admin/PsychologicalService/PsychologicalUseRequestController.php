<?php

namespace App\Http\Controllers\Web\Panel\Admin\PsychologicalService;

use App\Enums\RequestStatuses;
use App\Http\Controllers\Controller;
use App\Http\Resources\PsychologicalService\PsychologicalUseRequestResource;
use App\Models\PsychologicalUseRequest;
use Auth;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PsychologicalUseRequestController extends Controller
{
    public function index(): Factory|View|Application
    {
        $psychological_use_requests = PsychologicalUseRequest::query()->orderByDesc('id')->paginate(10);

        return view('panels.admin.psychological-services.requests')->with(['title' => 'گزارش های استفاده از خدمات روانشناختی' ,'psychological_use_requests' => $psychological_use_requests]);
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'center_id' => 'required|exists:psychological_centers,id',
            'date' => 'required|date'
        ]);

        $psychological_use_request = new PsychologicalUseRequest();
        $psychological_use_request->center_id = $request->input('center_id');
        $psychological_use_request->date = $request->input('date');
        $psychological_use_request->user_id = Auth::guard('api')->id();
        $psychological_use_request->status = RequestStatuses::REQUESTED;

        $psychological_use_request->save();

        return new JsonResponse(['psychological_use_request' => new PsychologicalUseRequestResource($psychological_use_request)]);
    }

    /**
     * @param PsychologicalUseRequest $psychological_use_request
     * @return Response
     */
    public function destroy(PsychologicalUseRequest $psychological_use_request): Response
    {
        $psychological_use_request->delete();

        return response()->noContent();
    }
}
