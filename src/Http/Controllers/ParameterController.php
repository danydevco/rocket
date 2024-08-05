<?php

namespace Danydevco\Rocket\Http\Controllers;

use Danydevco\Rocket\Http\Authorizes\ParameterAuthorize;
use Danydevco\Rocket\Http\Request\StoreParameterRequest;
use Danydevco\Rocket\Http\Request\UpdateParameterRequest;
use Danydevco\Rocket\Models\Parameter;
use Danydevco\Rocket\Models\Value;
use Danydevco\Rocket\Utils\Response;
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