<?php

namespace App\Http\Controllers\Web\Panel\Admin\EducationalService;

use App\Enums\RequestStatuses;
use App\Http\Controllers\Controller;
use App\Http\Resources\EducationalService\EducationalRequestResource;
use App\Models\EducationalCourseRequest;
use App\Rules\EndAfterStart;
use Auth;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EducationalRequestController extends Controller
{
    public function index(): Factory|View|Application
    {
        $educational_course_requests = EducationalCourseRequest::query()->orderByDesc('id')->paginate(10);

        return view('panels.admin.educational-services.requests')->with(['title'=>'لیست درخواست های ثبت به عنوان مدرس توسط عضو باشگاه','educational_course_requests'=>$educational_course_requests]);
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
            'educational_subject_id' => 'required|exists:advisory_requests,id'
        ]);

        $educational_course_request = new EducationalCourseRequest();
        $educational_course_request->time = $request->input('time');
        $educational_course_request->start = $request->input('start');
        $educational_course_request->end = $request->input('end');
        $educational_course_request->educational_subject_id = $request->input('educational_subject_id');
        $educational_course_request->user_id = Auth::guard('api')->id();
        $educational_course_request->status = RequestStatuses::REQUESTED;

        $educational_course_request->save();

        return new JsonResponse(['educational_course_request' => new EducationalRequestResource($educational_course_request)]);
    }

    public function destroy(EducationalCourseRequest $educational_course_request): Response
    {
        $educational_course_request->delete();

        return response()->noContent();
    }
}
