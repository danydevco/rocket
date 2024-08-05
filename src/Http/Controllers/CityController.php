<?php

namespace Danydevco\Rocket\Http\Controllers;

use Danydevco\Rocket\Http\Authorizes\CityAuthorize;
use Danydevco\Rocket\Http\Request\CreateCityRequest;
use Danydevco\Rocket\Http\Request\EditCityRequest;
use Danydevco\Rocket\Http\Request\IndexCityRequest;
use Danydevco\Rocket\Models\City;
use Danydevco\Rocket\Utils\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class CityController extends Controller {

    protected City          $city;
    protected CityAuthorize $authorize;

    public function __construct(City $city, CityAuthorize $authorize) {
        $this->city      = $city;
        $this->authorize = $authorize;
    }

    public function index(IndexCityRequest $request) {

        $user = User::findOrFail(Auth::id());

        $this->authorize->index($user);

        $cities = $this->city
            ->whereDepartmentId($request->get('department'))
            ->select(['id', 'name', 'state_id'])
            ->with(['state' => function ($query) {
                $query->select(['code', 'name', 'description']);
            }])
            ->get();

        $cities->makeHidden(['state_id']);

        return [
            'cities' => $cities,
        ];
    }

    public function store(CreateCityRequest $request) {

        $user = User::findOrFail(Auth::id());

        $this->authorize->create($user);

        $this->city::create($request->validated());

        return Response::successful();

    }

    public function update(EditCityRequest $request, City $city) {

        $user = User::findOrFail(Auth::id());

        $this->authorize->edit($user);

        $city->update($request->validated());

        return Response::successful();

    }

    public function destroy(City $city) {

        $user = User::findOrFail(Auth::id());

        $this->authorize->destroy($user);

        $city->delete();

        return Response::successful();

    }
}