<?php

namespace DeveloperHouse\Rocket\Models;

use Illuminate\Database\Eloquent\Model;

class Error extends Model {
    protected $fillable = ['message', 'stack_trace', 'url', 'input'];

}
