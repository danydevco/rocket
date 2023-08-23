<?php

namespace DeveloperHouse\Rocket\Http\Authorizes;
use App\Models\User;

class ParameterAuthorize {

    /**
     * ValueAuthorize constructor.
     */
    public function __construct() { }

    public function store(User $auth) {
        if (!$auth->can('parameter.create')) {
            abort(403, trans('rocket::message.unauthorized'));
        }
    }

    public function update(User $auth) {
        if (!$auth->can('parameter.update')) {
            abort(403, trans('rocket::message.unauthorized'));
        }
    }

}