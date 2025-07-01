<?php

namespace App\Http\Controllers\Api\EducationalService;

use App\Http\Controllers\Controller;
use App\Http\Resources\EducationalService\EducationalSubjectResource;
use App\Models\EducationalSubject;
use Illuminate\Http\JsonResponse;

class EducationalSubjectController extends Controller
{
    public function index(): JsonResponse
    {
        $advisory_subject = EducationalSubject::query()->orderByDesc('id')->get();

        return EducationalSubjectResource::collection($advisory_subject)->response();
    }
}
