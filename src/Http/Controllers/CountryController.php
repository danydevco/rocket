<?php

namespace Danydevco\Rocket\Http\Controllers;

use Danydevco\Rocket\Http\Authorizes\CountryAuthorize;
use Danydevco\Rocket\Http\Request\CreateCountryRequest;
use Danydevco\Rocket\Http\Request\UpdateCountryRequest;
use Danydevco\Rocket\Models\Country;
use Danydevco\Rocket\Utils\Response;
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