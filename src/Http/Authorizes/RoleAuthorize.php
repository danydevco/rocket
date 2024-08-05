<?php

namespace Danydevco\Rocket\Http\Authorizes;

use App\Models\User;

class RoleAuthorize {
    public function __construct() { }

    /**
     * @param User $auth
     *
     * @return void
     */
    public function index(User $auth) {
        if (!$auth->can('role.index')) {
            abort(403, trans('rocket::message.unauthorized'));
        }
    }

    /**
     * @param User $auth
     *
     * @return void
     */
    public function create(User $auth) {
        if (!$auth->can('role.create')) {
            abort(403, trans('rocket::message.unauthorized'));
        }
    }

    /**
     * @param User $auth
     *
     * @return void
     */
    public function assignPermissionToRole(User $auth): void {
        if (!$auth->can('assign.permission.to.role')) {
            abort(403, trans('rocket::message.unauthorized'));
        }
    }


    public function assignToUser(User $auth) {
        if (!$auth->can('assign.permission.to.user')) {
            abort(403, trans('rocket::message.unauthorized'));
        }
    }

}