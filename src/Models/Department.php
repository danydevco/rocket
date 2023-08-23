<?php

namespace DeveloperHouse\Rocket\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model {

    protected $fillable = [
        'name',
        'abbreviation',
        'country_id',
        'state_id',
    ];

    public function country() {
        return $this->belongsTo(Country::class);
    }

    public function state() {
        return $this->belongsTo(Parameter::class, 'state_id', 'code');
    }
}
