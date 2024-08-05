<?php

namespace Danydev\Rocket\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model {

    protected $fillable = ['name', 'department_id', 'state_id'];

    public function department() {
        return $this->belongsTo(Department::class);
    }

    public function state() {
        return $this->belongsTo(Parameter::class, 'state_id', 'code');
    }



}
