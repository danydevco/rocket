<?php

namespace Danydevco\Rocket\Traits;

use Danydevco\Rocket\Models\Parameter;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Spatie\Permission\Traits\HasRoles;

trait UserRocketTrait {

    use HasRoles, TwoFactorAuthenticatable;

    public function state() {
        return $this->belongsTo(Parameter::class, 'state_id', 'code');
    }

    /**
     * Devuelve el supervisor del usuario
     *
     * @return BelongsTo
     */
    public function supervisor(): BelongsTo {
        return $this->belongsTo(User::class, 'supervisor_id');
    }

    public function getNameAttribute() {
        return $this->first_name . ' ' . $this->last_name;
    }
}
