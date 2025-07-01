<?php

namespace App\Http\Controllers\Api;

use App\Enums\GenderTypes;
use App\Enums\RelationshipTypes;
use App\Http\Controllers\Controller;
use App\Http\Resources\DependentResource;
use App\Models\Dependent;
use App\Rules\Cellphone;
use Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class DependentController extends Controller
{
    use AuthorizesRequests;

    public function index(Request $params): JsonResponse
    {
        $dependent = Dependent::query()->whereSupervisorId(Auth::guard('api')->id())->orderByDesc('created_at');

        if (!empty($params['first_name'])) {
            $dependent = $dependent->where('first_name', 'like', '%' . $params['first_name'] . '%');
        }
        if (!empty($params['last_name'])) {
            $dependent = $dependent->where('last_name', 'like', '%' . $params['last_name'] . '%');
        }

        if (!empty($params['national_id'])) {
            $dependent = $dependent->where('last_name', $params['national_id']);
        }

        if (!empty($params['gender'])) {
            $dependent = $dependent->where('gender', $params['gender']);
        }

        if (!empty($params['relationship'])) {
            $dependent = $dependent->where('relationship', $params['relationship']);
        }

        if (!empty($params['birth_date'])) {
            $dependent = $dependent->where('birth_date', $params['birth_date']);
        }

        if ($params->input('page') === 'all') {
            return DependentResource::collection($dependent->get())->response();
        } else {
            return DependentResource::collection($dependent->paginate(10))->response();
        }
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

        $dependent->supervisor_id = Auth::guard('api')->id();
        $dependent->first_name = $request->input('first_name');
        $dependent->last_name = $request->input('last_name');
        $dependent->national_id = $request->input('national_id');
        $dependent->relationship = $request->input('relationship');
        $dependent->gender = $request->input('gender');
        $dependent->birth_date = $request->input('birth_date');
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

        $dependent->supervisor_id = Auth::guard('api')->id() ?? $dependent->supervisor_id;
        $dependent->first_name = $request->input('first_name') ?? $dependent->first_name;
        $dependent->last_name = $request->input('last_name') ?? $dependent->last_name;
        $dependent->national_id = $request->input('national_id') ?? $dependent->national_id;
        $dependent->relationship = $request->input('relationship') ?? $dependent->relationship;
        $dependent->gender = $request->input('gender') ?? $dependent->gender;
        $dependent->birth_date = $request->input('birth_date') ?? $dependent->birth_date;
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
}
