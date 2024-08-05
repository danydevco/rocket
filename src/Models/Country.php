<?php

namespace Danydevco\Rocket\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Country extends Model {
    protected $fillable = ['name', 'abbreviation', 'state_id'];

    public function state(): BelongsTo {
        return $this->belongsTo(Parameter::class, 'state_id', 'code');
    }

    public function departments() {
        return $this->hasMany(Department::class);
    }

}
