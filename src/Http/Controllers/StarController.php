<?php

namespace Danydevco\Rocket\Http\Controllers;


use Carbon\Carbon;
use Danydevco\Rocket\Models\CustomHeader;
use Illuminate\Support\Str;

class StarController extends RocketController {

    public function index() {

        $expiresAt = Carbon::now()->addMinutes(config('rocket.sanctum.expiration'));

        $customHeader = new CustomHeader();
        $customHeader->type_id = 1;
        $customHeader->name = 'uuid';
        $customHeader->value = Str::uuid();
        $customHeader->domain = '';
        $customHeader->expiration_date = $expiresAt;
        $customHeader->user_id = 1;
        $customHeader->save();

        return $this->success(message: 'init')->cookie('uuid', $customHeader->value, $expiresAt);
    }


}
