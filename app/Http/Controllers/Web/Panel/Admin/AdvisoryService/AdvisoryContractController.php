<?php

namespace App\Http\Controllers\Web\Panel\Admin\AdvisoryService;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdvisoryService\AdvisoryContractResource;
use App\Models\AdvisoryContract;
use Auth;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;

class AdvisoryContractController extends Controller
{
    public function index(): Factory|View|Application
    {
        $advisory_contracts = AdvisoryContract::query()->orderByDesc('id')->paginate(10);

        return view('panels.admin.advisory-services.contracts')->with(['title'=>'لیست قرارداد های مشاوره ای اعضای باشگاه','advisory_contracts'=>$advisory_contracts]);
    }
}
