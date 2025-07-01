<?php

namespace App\Http\Controllers\Web\Panel\Admin;

use App\Enums\GenderTypes;
use App\Enums\RelationshipTypes;
use App\Http\Controllers\Controller;
use App\Http\Resources\DependentResource;
use App\Models\Dependent;
use App\Models\Province;
use App\Models\User;
use App\Rules\Cellphone;
use Auth;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Morilog\Jalali\Jalalian;

class DependentController extends Controller
{
    use AuthorizesRequests;

    public function index(): Factory|View|Application
    {
        $dependents = Dependent::query()->orderByDesc('created_at')->paginate(10);

        return view('panels.admin.dependents.index')
            ->with(['title' => 'افراد تحت تکفل',
                'dependents' => $dependents,
                'users' => User::query()->get(),
                'provinces' => Province::query()->get()
            ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'supervisor_id' => 'required|exists:users,id',
            'national_id' => 'required|string',
            'relationship' => ['required', RelationshipTypes::validation()],
            'gender' => ['required', GenderTypes::validation()],
            'birth_date' => 'required|date',
            'father_name' => 'required|string',
            'birth_city_id' => 'required|exists:cities,id',
            'insured_code' => 'required|string',
            'cellphone' => ['required', new Cellphone()],
            'birth_certificate_number' => 'required|string'
        ]);

        $dependent = new Dependent();

        $dependent->supervisor_id = $request->input('supervisor_id');
        $dependent->first_name = $request->input('first_name');
        $dependent->last_name = $request->input('last_name');
        $dependent->national_id = $request->input('national_id');
        $dependent->relationship = $request->input('relationship');
        $dependent->gender = $request->input('gender');
        $dependent->birth_date = Jalalian::fromFormat('Y/m/d', $request->input('birth_date'))->toCarbon();
        $dependent->father_name = $request->input('father_name');
        $dependent->birth_city_id = $request->input('birth_city_id');
        $dependent->insured_code = $request->input('insured_code');
        $dependent->cellphone = $request->input('cellphone');
        $dependent->birth_certificate_number = $request->input('birth_certificate_number');

        $dependent->save();

        return new JsonResponse(['dependent' => new DependentResource($dependent)]);
    }

    /**
     * @param Request $request
     * @param Dependent $dependent
     * @return JsonResponse
     */
    public function update(Request $request, Dependent $dependent): JsonResponse
    {
        $request->validate([
            'first_name' => 'nullable|string',
            'last_name' => 'nullable|string',
            'supervisor_id' => 'nullable|exists:users,id',
            'national_id' => 'nullable|string',
            'relationship' => ['nullable', RelationshipTypes::validation()],
            'gender' => ['nullable', GenderTypes::validation()],
            'birth_date' => 'nullable|date',
            'father_name' => 'nullable|string',
            'birth_city_id' => 'nullable|exists:cities,id',
            'insured_code' => 'nullable|string',
            'cellphone' => ['nullable', new Cellphone()],
            'birth_certificate_number' => 'nullable|string'
        ]);

        $dependent->supervisor_id = $request->input('supervisor_id') ?? $dependent->supervisor_id;
        $dependent->first_name = $request->input('first_name') ?? $dependent->first_name;
        $dependent->last_name = $request->input('last_name') ?? $dependent->last_name;
        $dependent->national_id = $request->input('national_id') ?? $dependent->national_id;
        $dependent->relationship = $request->input('relationship') ?? $dependent->relationship;
        $dependent->gender = $request->input('gender') ?? $dependent->gender;
        $dependent->birth_date = Jalalian::fromFormat('Y/m/d', $request->input('birth_date'))->toCarbon() ?? $dependent->birth_date;
        $dependent->father_name = $request->input('father_name') ?? $dependent->father_name;
        $dependent->birth_city_id = $request->input('birth_city_id') ?? $dependent->birth_city_id;
        $dependent->insured_code = $request->input('insured_code') ?? $dependent->insured_code;
        $dependent->cellphone = $request->input('cellphone') ?? $dependent->cellphone;
        $dependent->birth_certificate_number = $request->input('birth_certificate_number') ?? $dependent->birth_certificate_number;

        $dependent->save();

        return new JsonResponse(['dependent' => new DependentResource($dependent)]);
    }

    /**
     * @param Dependent $dependent
     * @return Response
     */
    public function destroy(Dependent $dependent): Response
    {
        $dependent->delete();

        return response()->noContent();
    }

    public function getDependentsBySupervisor(Request $params): JsonResponse
    {
        $dependents = Dependent::query();

        if (isset($params['supervisor_id'])) {
            $dependents = $dependents->whereSupervisorId($params['supervisor_id'])->orderByDesc('created_at')->get();
        } else {
            $dependents = $dependents->orderByDesc('created_at')->paginate(10);
        }

        return new JsonResponse(['dependents' => $dependents]);
    }
}
