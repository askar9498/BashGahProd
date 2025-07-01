<?php

namespace App\Http\Controllers\Api\EducationalService;

use App\Http\Controllers\Controller;
use App\Http\Resources\EducationalService\EducationalCourseResource;
use App\Models\EducationalCourse;
use Auth;
use Illuminate\Http\JsonResponse;

class EducationalCourseController extends Controller
{
    public function index(): JsonResponse
    {
        $educational_course = EducationalCourse::query()->with(['user','subject'])->whereUserId(Auth::guard('api')->id())->orderByDesc('id')->paginate(10);

        return EducationalCourseResource::collection($educational_course)->response();
    }
}
