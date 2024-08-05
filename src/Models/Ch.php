<?php

namespace Danydevco\Rocket\Models;

use Illuminate\Database\Eloquent\Model;

class Ch extends Model {
    protected $fillable
        = [
            'type_id',
            'name',
            'value',
            'domain',
            'expiration_date',
            'user_id',
        ];

    protected $casts
        = [
            'expiration_date' => 'date',
        ];
}
