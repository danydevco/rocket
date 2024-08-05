<?php

namespace Danydevco\Rocket\Http\Authorizes;

use App\Models\User;

class PermissionAuthorize {
    public function __construct() { }

    public function index(User $auth) {
        if (!$auth->can('permission.index')) {
            abort(403, trans('rocket::message.unauthorized'));
        }
    }

    public function create(User $auth) {
        if (!$auth->can('permission.create')) {
            abort(403, trans('rocket::message.unauthorized'));
        }
    }

    public function destroy(User $auth) {
        if (!$auth->can('permission.destroy')) {
            abort(403, trans('rocket::message.unauthorized'));
        }
    }

}