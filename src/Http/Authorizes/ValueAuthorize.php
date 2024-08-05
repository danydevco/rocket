<?php

namespace Danydevco\Rocket\Http\Authorizes;
use App\Models\User;

class ValueAuthorize {

    /**
     * ValueAuthorize constructor.
     */
    public function __construct() { }

    public function index(User $auth) {
        if (!$auth->can('value.index')) {
            abort(403, trans('rocket::message.unauthorized'));
        }
    }

    public function store(User $auth) {
        if (!$auth->can('value.create')) {
            abort(403, trans('rocket::message.unauthorized'));
        }
    }

    public function update(User $auth) {
        if (!$auth->can('value.update')) {
            abort(403, trans('rocket::message.unauthorized'));
        }
    }

    public function show(User $auth) {
        if (!$auth->can('value.show')) {
            abort(403, trans('rocket::message.unauthorized'));
        }
    }

}