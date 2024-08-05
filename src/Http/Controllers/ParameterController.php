<?php

namespace Danydev\Rocket\Http\Controllers;

use Danydev\Rocket\Http\Authorizes\ParameterAuthorize;
use Danydev\Rocket\Http\Request\StoreParameterRequest;
use Danydev\Rocket\Http\Request\UpdateParameterRequest;
use Danydev\Rocket\Models\Parameter;
use Danydev\Rocket\Models\Value;
use Danydev\Rocket\Utils\Response;
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