<?php

namespace Danydev\Rocket\Http\Controllers;


use Carbon\Carbon;
use Danydev\Rocket\Models\Ch;
use Illuminate\Support\Str;

class StarController extends RocketController {

    public function index() {

        $expiresAt = Carbon::now()->addMinutes(config('rocket.sanctum.expiration'));

        $ch = new Ch();
        $ch->type_id = 1;
        $ch->name = 'uuid';
        $ch->value = Str::uuid();
        $ch->domain = '';
        $ch->expiration_date = $expiresAt;
        $ch->user_id = 1;
        $ch->save();

        return $this->success(message: 'init')->cookie('uuid', $ch->value, $expiresAt);
    }


}
