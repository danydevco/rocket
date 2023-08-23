<?php

namespace DeveloperHouse\Rocket\Http\Authorizes;

use App\Models\User;

class CountryAuthorize {
    public function __construct() { }

    public function index(User $auth) {
        if (!$auth->can('country.index')) {
            abort(403, trans('rocket::message.unauthorized'));
        }
    }

    public function create(User $auth) {
        if (!$auth->can('country.create')) {
            abort(403, trans('rocket::message.unauthorized'));
        }
    }

    public function edit(User $auth) {
        if (!$auth->can('country.edit')) {
            abort(403, trans('rocket::message.unauthorized'));
        }
    }

    public function show(User $auth) {
        if (!$auth->can('country.show')) {
            abort(403, trans('rocket::message.unauthorized'));
        }
    }

    public function destroy(User $auth) {
        if (!$auth->can('country.destroy')) {
            abort(403, trans('rocket::message.unauthorized'));
        }
    }

}