<?php

namespace Danydevco\Rocket\Http\Controllers;

use Danydevco\Rocket\Http\Authorizes\RoleAuthorize;
use Danydevco\Rocket\Http\Request\AssignPermissionRequest;
use Danydevco\Rocket\Http\Request\CreateRoleRequest;
use Danydevco\Rocket\Utils\Response;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

class RoleController extends Controller {

    protected RoleAuthorize $authorize;

    public function __construct(RoleAuthorize $authorize) {
        $this->authorize = $authorize;
    }

    public function index() {

        $user = User::findOrFail(Auth::id());

        $this->authorize->index($user);

        $roles = Role::select(['id', 'name', 'description'])->get();

        return Response::successful([
            'roles' => $roles,
        ]);

    }

    public function store(CreateRoleRequest $request) {

        $user = User::findOrFail(Auth::id());

        $this->authorize->create($user);

        Role::create([
            'name' => $request->get('name'),
            'display_name' => $request->get('display_name'),
            'description' => $request->get('description'),
            'guard_name' => 'web',
        ]);

        return Response::successful();
    }

    public function show(Role $role) {

        $user = User::findOrFail(Auth::id());

        $this->authorize->index($user);

        $permissions = Permission::select(['id', 'name', 'description', 'guard_name'])->get();

        foreach ($permissions as $permission) {
            $permission->setAttribute('has_permission', $role->hasPermissionTo($permission->name));
        }

        $role->makeHidden(['permissions', 'guard_name', 'pivot', 'created_at', 'updated_at']);

        return Response::successful([
            'role' => $role,
            'permissions' => $permissions,
        ]);

    }

    public function assignPermissionToRole(AssignPermissionRequest $request) {

        $user = User::findOrFail(Auth::id());

        $this->authorize->assignPermissionToRole($user);

        $permission = Permission::findOrFail($request->permission);

        $role = Role::findOrFail($request->role);

        $role->givePermissionTo($permission->name);

        return Response::successful();
    }
}