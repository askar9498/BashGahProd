<?php

namespace App\Http\Controllers\Web\Panel\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RolePermissionController extends Controller
{
    public function index(Role $role): Factory|View|Application
    {
        $permissions = $role->getAllPermissions();
        return view('panels.admin.roles.edit')
            ->with(['title' => 'ویرایش دسترسی ها',
                'role' => $role, 'permissions' => $permissions, 'all_permissions' => Permission::all()->groupBy('model_translate')]);
    }

    /**
     * @param Request $request
     * @param Role $role
     * @return Response
     */
    public function store(Request $request, Role $role): \Illuminate\Http\Response
    {
        $request->validate([
            'permissions' => 'nullable|array',
            'permissions.*' => 'exists:permissions,name'
        ]);

        $role->syncPermissions($request->input('permissions'));

        return response()->noContent();
    }
}
