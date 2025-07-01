<?php

namespace App\Http\Controllers\Web\Panel\Admin\PsychologicalService;

use App\Http\Controllers\Controller;
use App\Http\Resources\PsychologicalService\PsychologicalCenterResource;
use App\Models\PsychologicalCenter;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;

class PsychologicalCenterController extends Controller
{
    public function index(): Factory|View|Application
    {
        $psychological_centers = PsychologicalCenter::query()->orderByDesc('id')->paginate(10);

        return view('panels.admin.psychological-services.centers')->with(['title' => 'لیست مراکز روانشناختی', 'psychological_centers' => $psychological_centers]);
    }
}
