<?php

namespace Danydev\Rocket\Http\Controllers;

use Danydev\Rocket\Http\Authorizes\PermissionAuthorize;
use Danydev\Rocket\Http\Request\CreatePermissionRequest;
use Danydev\Rocket\Http\Request\CreateRoleRequest;
use Danydev\Rocket\Http\Request\IndexPermissionRequest;
use Danydev\Rocket\Utils\Response;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

class PermissionController extends Controller {

        protected PermissionAuthorize $authorize;

        public function __construct(PermissionAuthorize $authorize) {
                $this->authorize = $authorize;
        }

        public function index(IndexPermissionRequest $request) {

                $user = User::findOrFail(Auth::id());

                $this->authorize->index($user);

                $permissions = Permission::where('name', 'like', '%' . $request->search . '%')
                    ->select(['id', 'name', 'description', 'guard_name'])->get();

                return Response::successful([
                    'permissions' => $permissions,
                ]);

        }

        public function store(CreatePermissionRequest $request) {

                $user = User::findOrFail(Auth::id());

                $this->authorize->create($user);

                Permission::create([
                    'name' => $request->get('name'),
                    'description' => $request->get('description'),
                    'guard_name' => 'web',
                ]);

                return Response::successful();
        }

        /*


        public function store(CreatePermissionRequest $request) {

            $user = User::findOrFail(Auth::id());

            $this->authorize->create($user);

            $role = Role::findOrFail($request->role);

            Permission::create([
                'name' => $request->get('name'),
                'description' => $request->get('description'),
                'guard_name' => 'web',
            ]);

            $role->givePermissionTo($request->name);

            return Response::successful();
        }

        */
}