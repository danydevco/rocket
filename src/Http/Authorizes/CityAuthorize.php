<?php

namespace Danydevco\Rocket\Http\Authorizes;

use App\Models\User;

class CityAuthorize {
    public function __construct() { }

    public function index(User $auth) {
        if (!$auth->can('city.index')) {
            abort(403, trans('rocket::message.unauthorized'));
        }
    }

    public function create(User $auth) {
        if (!$auth->can('city.create')) {
            abort(403, trans('rocket::message.unauthorized'));
        }
    }

    public function edit(User $auth) {
        if (!$auth->can('city.edit')) {
            abort(403, trans('rocket::message.unauthorized'));
        }
    }

    public function destroy(User $auth) {
        if (!$auth->can('city.destroy')) {
            abort(403, trans('rocket::message.unauthorized'));
        }
    }
}