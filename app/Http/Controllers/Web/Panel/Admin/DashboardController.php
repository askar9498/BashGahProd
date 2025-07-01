<?php

namespace App\Http\Controllers\Web\Panel\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\FilterService;
use Auth;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;

class DashboardController extends Controller
{
    protected FilterService $filterService;

    public function __construct(FilterService $filterService)
    {
        $this->filterService = $filterService;
    }

    /**
     * @return Factory|View|Application
     */
    public function index(): Factory|View|Application
    {
        return view('panels.admin.dashboard.index')->with(['title' => 'داشبورد']);
    }
}
