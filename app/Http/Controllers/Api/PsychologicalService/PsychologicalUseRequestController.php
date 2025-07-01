<?php

namespace App\Http\Controllers\Api\PsychologicalService;

use App\Enums\RequestStatuses;
use App\Http\Controllers\Controller;
use App\Http\Resources\PsychologicalService\PsychologicalUseRequestResource;
use App\Models\PsychologicalUseRequest;
use Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PsychologicalUseRequestController extends Controller
{
    public function index(): JsonResponse
    {
        $psychological_use_requests = PsychologicalUseRequest::query()->whereUserId(Auth::guard('api')->id())->orderByDesc('id')->paginate(10);

        return PsychologicalUseRequestResource::collection($psychological_use_requests)->response();
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
