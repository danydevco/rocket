<?php

namespace Danydev\Rocket\Http\Controllers;

use Danydev\Rocket\Http\Authorizes\ValueAuthorize;
use Danydev\Rocket\Http\Request\StoreValueRequest;
use Danydev\Rocket\Http\Request\UpdateValueRequest;
use Danydev\Rocket\Models\Parameter;
use Danydev\Rocket\Models\Value;
use Danydev\Rocket\Utils\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ValueController extends Controller {

    protected Value          $value;
    protected ValueAuthorize $authorize;

    public function __construct(Value $value, ValueAuthorize $authorize) {
        $this->value     = $value;
        $this->authorize = $authorize;
    }

    public function index(Request $request) {

        $user = User::findOrFail(Auth::id());

        $this->authorize->index($user);

        $values = Value::search($request->get('search'))
            ->select(['id', 'name', 'description', 'state'])
            ->simplePaginate(10);

        return ['values' => $values];

    }

    /**
     * @param StoreValueRequest $request
     *
     * @return array
     */
    public function store(StoreValueRequest $request) {

        $user = User::findOrFail(Auth::id());

        $this->authorize->store($user);

        Value::store($request);

        return Response::successful();

    }

    /**
     * @param UpdateValueRequest $request
     * @param Value              $value
     *
     * @return array
     */
    public function update(UpdateValueRequest $request, Value $value) {

        $user = User::findOrFail(Auth::id());

        $this->authorize->update($user);

        $value::modified($request, $value);

        return Response::successful();

    }

    public function show(Request $request, Value $value) {

        $user = User::findOrFail(Auth::id());

        $this->authorize->show($user);

        $parameters = $value->parameters()->searchAndOrderBy($request->get('search'));;

        return [
            'parameters' => $parameters,
            'value' => $value,
        ];

    }


}