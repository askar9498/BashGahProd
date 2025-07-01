<?php

namespace App\Http\Controllers\Web\Panel\Admin\EducationalService;

use App\Http\Controllers\Controller;
use App\Http\Resources\EducationalService\EducationalCourseResource;
use App\Models\EducationalCourse;
use Auth;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;

class EducationalCourseController extends Controller
{
    public function index(): Factory|View|Application
    {
        $educational_courses = EducationalCourse::query()->with(['user','subject'])->orderByDesc('id')->paginate(10);

        return view('panels.admin.educational-services.courses')->with(['title'=>'لیست دوره های برگزار شده عضو باشگاه','educational_courses'=>$educational_courses]);
    }
}
