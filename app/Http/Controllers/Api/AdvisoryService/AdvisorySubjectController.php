<?php

namespace App\Http\Controllers\Api\AdvisoryService;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdvisoryService\AdvisorySubjectResource;
use App\Models\AdvisorySubject;
use Illuminate\Http\JsonResponse;

class AdvisorySubjectController extends Controller
{
    public function index(): JsonResponse
    {
        $advisory_subject = AdvisorySubject::orderByDesc('id')->get();

        return AdvisorySubjectResource::collection($advisory_subject)->response();
    }
}
