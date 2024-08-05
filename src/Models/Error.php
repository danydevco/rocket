<?php

namespace Danydevco\Rocket\Models;

use Illuminate\Database\Eloquent\Model;

class Error extends Model {
    protected $fillable = ['user_id', 'message', 'stack_trace', 'url', 'input'];

}
