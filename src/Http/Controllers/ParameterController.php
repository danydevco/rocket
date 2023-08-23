<?php

namespace DeveloperHouse\Rocket\Http\Controllers;

use DeveloperHouse\Rocket\Http\Authorizes\ParameterAuthorize;
use DeveloperHouse\Rocket\Http\Request\StoreParameterRequest;
use DeveloperHouse\Rocket\Http\Request\UpdateParameterRequest;
use DeveloperHouse\Rocket\Models\Parameter;
use DeveloperHouse\Rocket\Models\Value;
use DeveloperHouse\Rocket\Utils\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ParameterController extends Controller {

    protected Parameter          $parameter;
    protected ParameterAuthorize $authorize;

    public function __construct(Parameter $parameter, ParameterAuthorize $authorize) {
        $this->parameter = $parameter;
        $this->authorize = $authorize;
    }

    public function store(StoreParameterRequest $request, Value $value) {

        $user = User::findOrFail(Auth::id());

        $this->authorize->store($user);

        Parameter::store($request, $value);

        return Response::successful();

    }

    public function update(UpdateParameterRequest $request, Value $value, Parameter $parameter) {

        $user = User::findOrFail(Auth::id());

        $this->authorize->update($user);

        Parameter::modified($request, $value, $parameter);

        return Response::successful();

    }

}