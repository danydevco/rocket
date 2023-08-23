<?php

namespace DeveloperHouse\Rocket\Http\Controllers;

use DeveloperHouse\Rocket\Http\Authorizes\CountryAuthorize;
use DeveloperHouse\Rocket\Http\Request\CreateCountryRequest;
use DeveloperHouse\Rocket\Http\Request\UpdateCountryRequest;
use DeveloperHouse\Rocket\Models\Country;
use DeveloperHouse\Rocket\Utils\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class CountryController extends Controller {

    protected Country          $country;
    protected CountryAuthorize $authorize;

    public function __construct(Country $country, CountryAuthorize $authorize) {
        $this->country   = $country;
        $this->authorize = $authorize;
    }

    public function index() {

        $user = User::findOrFail(Auth::id());

        $this->authorize->index($user);

        $countries = $this->country
            ->select(['id', 'name', 'abbreviation', 'state_id'])
            ->with(['state' => function ($query) {
                $query->select(['code', 'name', 'description']);
            }])
            ->get();

        $countries->makeHidden(['state_id']);

        return [
            'countries' => $countries,
        ];
    }

    public function store(CreateCountryRequest $request) {

        $user = User::findOrFail(Auth::id());

        $this->authorize->create($user);

        Country::create($request->validated());

        return Response::successful();

    }


    public function update(UpdateCountryRequest $request, Country $country) {
        $user = User::findOrFail(Auth::id());

        $this->authorize->edit($user);

        $country->update($request->validated());

        return Response::successful();

    }

    public function destroy(Country $country) {
        $user = User::findOrFail(Auth::id());

        $this->authorize->destroy($user);

        $country->delete();

        return Response::successful();
    }
}