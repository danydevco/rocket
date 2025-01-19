<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Danydevco\Rocket\Traits\UserRocketTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, UserRocketTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable
        = [
            'uuid',             // Agregado para permitir la inserción
            'first_names',
            'last_names',
            'email',
            'password',
            'username',
            'photo',
            'type_document_id',
            'document',
            'gender_id',
            'supervisor_id',
            'state_id',
        ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden
        = [
            'password',
            'remember_token',
        ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function sendPasswordResetNotification($token) {
        $this->notify(new ResetPasswordNotification($token));
    }
}
