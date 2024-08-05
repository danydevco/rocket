<?php

namespace Danydevco\Rocket\Http\Authorizes;

use App\Models\User;

class DepartmentAuthorize {

    public function __construct() { }

    public function index(User $auth) {
        if (!$auth->can('department.index')) {
            abort(403, trans('rocket::message.unauthorized'));
        }
    }

    public function create(User $auth) {
        if (!$auth->can('department.create')) {
            abort(403, trans('rocket::message.unauthorized'));
        }
    }

    public function edit(User $auth) {
        if (!$auth->can('department.edit')) {
            abort(403, trans('rocket::message.unauthorized'));
        }
    }

    public function destroy(User $auth) {
        if (!$auth->can('department.destroy')) {
            abort(403, trans('rocket::message.unauthorized'));
        }
    }

}