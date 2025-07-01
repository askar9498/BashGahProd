<?php

namespace App\Http\Controllers\Web\Panel\Admin\AdvisoryService;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdvisoryService\AdvisorySubjectResource;
use App\Models\AdvisorySubject;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;

class AdvisorySubjectController extends Controller
{
    public function index(): Factory|View|Application
    {
        $advisory_subjects = AdvisorySubject::orderByDesc('id')->paginate(10);

        return view('panels.admin.advisory-services.subjects')->with(['title'=>'لیست موضوعات مشاوره','advisory_subjects'=>$advisory_subjects]);
    }
}
