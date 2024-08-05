<?php

namespace Danydev\Rocket\Http\Controllers;

use Danydev\Rocket\Http\Authorizes\DepartmentAuthorize;
use Danydev\Rocket\Http\Request\CreateDepartmentRequest;
use Danydev\Rocket\Http\Request\IndexDepartmentRequest;
use Danydev\Rocket\Http\Request\UpdateDepartmentRequest;
use Danydev\Rocket\Models\Department;
use Danydev\Rocket\Utils\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class DepartmentController extends Controller {

    protected Department          $department;
    protected DepartmentAuthorize $authorize;

    public function __construct(Department $department, DepartmentAuthorize $authorize) {
        $this->department = $department;
        $this->authorize  = $authorize;
    }

    public function index(IndexDepartmentRequest $request) {

        $user = User::findOrFail(Auth::id());

        $this->authorize->index($user);

        $departments = $this->department
            ->whereCountryId($request->get('country'))
            ->select(['id', 'name', 'state_id'])
            ->with(['state' => function ($query) {
                $query->select(['code', 'name', 'description']);
            }])
            ->get();

        $departments->makeHidden(['state_id']);

        return [
            'departments' => $departments,
        ];
    }

    public function store(CreateDepartmentRequest $request) {

        $user = User::findOrFail(Auth::id());

        $this->authorize->create($user);

        $this->department::create($request->validated());

        return Response::successful();

    }

    public function update(UpdateDepartmentRequest $request, Department $department) {

        $user = User::findOrFail(Auth::id());

        $this->authorize->edit($user);

        $department->update($request->validated());

        return Response::successful();

    }

    public function destroy(Department $department) {

        $user = User::findOrFail(Auth::id());

        $this->authorize->destroy($user);

        $department->delete();

        return Response::successful();

    }

}