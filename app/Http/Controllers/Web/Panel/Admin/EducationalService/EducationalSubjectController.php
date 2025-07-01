<?php

namespace App\Http\Controllers\Web\Panel\Admin\EducationalService;

use App\Http\Controllers\Controller;
use App\Models\EducationalSubject;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class EducationalSubjectController extends Controller
{
    public function index(): Factory|View|Application
    {
        $educational_subjects = EducationalSubject::query()->orderByDesc('id')->paginate(10);

        return view('panels.admin.educational-services.subjects')->with(['title'=>'لیست موضوعات دوره های آموزشی','educational_subjects'=>$educational_subjects]);
    }
}
