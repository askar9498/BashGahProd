<?php

namespace App\Http\Controllers\Web\Panel\Admin\AdvisoryService;

use App\Enums\RequestStatuses;
use App\Http\Controllers\Controller;
use App\Http\Resources\AdvisoryService\AdvisoryRequestResource;
use App\Models\AdvisoryRequest;
use App\Rules\EndAfterStart;
use Auth;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AdvisoryRequestController extends Controller
{

    public function index(): Factory|View|Application
    {
        $advisory_requests = AdvisoryRequest::query()->orderByDesc('id')->paginate(10);

        return view('panels.admin.advisory-services.requests')->with(['title'=>'لیست درخواست های ثبت به عنوان مشاور','advisory_requests'=>$advisory_requests]);

    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'time' => 'required|numeric',
            'start' => 'required|date',
            'end' => [
                'required',
                'date',
                new EndAfterStart($request->input('start'))
            ],
            'advisory_subject_id' => 'required|exists:advisory_requests,id'
        ]);

        $advisory_request = new AdvisoryRequest();
        $advisory_request->time = $request->input('time');
        $advisory_request->start = $request->input('start');
        $advisory_request->end = $request->input('end');
        $advisory_request->advisory_subject_id = $request->input('advisory_subject_id');
        $advisory_request->user_id = Auth::guard('api')->id();
        $advisory_request->status = RequestStatuses::REQUESTED;

        $advisory_request->save();

        return new JsonResponse(['advisory_request' => new AdvisoryRequestResource($advisory_request)]);
    }

    public function destroy(AdvisoryRequest $advisory_request): Response
    {
        $advisory_request->delete();

        return response()->noContent();
    }
}
