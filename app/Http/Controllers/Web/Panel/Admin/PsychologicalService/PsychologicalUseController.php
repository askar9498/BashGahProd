<?php

namespace App\Http\Controllers\Web\Panel\Admin\PsychologicalService;

use App\Http\Controllers\Controller;
use App\Http\Resources\PsychologicalService\PsychologicalUseResource;
use App\Models\PsychologicalUse;
use Auth;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;

class PsychologicalUseController extends Controller
{
    public function index(): Factory|View|Application
    {
        $psychological_uses = PsychologicalUse::query()->orderByDesc('id')->paginate(10);

        return view('panels.admin.psychological-services.uses')->with(['title' => 'درخواست های استفاده از خدمات روانشناختی', 'psychological_uses' => $psychological_uses]);
    }
}
