<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers {
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param array<string, string> $input
     */
    public function create(array $input): User {

        $messages = [
            'first_names.required' => 'El nombre es obligatorio.',
            'first_names.string'   => 'El nombre debe ser una cadena de texto.',
            'first_names.max'      => 'El nombre no debe superar los 255 caracteres.',

            'email.required'       => 'El correo electrónico es obligatorio.',
            'email.string'         => 'El correo debe ser una cadena de texto.',
            'email.email'          => 'El correo electrónico no es válido.',
            'email.max'            => 'El correo no debe superar los 255 caracteres.',
            'email.unique'         => 'El correo ya está registrado.',

            'password.required'    => 'La contraseña es obligatoria.',
            'password.string'      => 'La contraseña debe ser una cadena de texto.',
            'password.min'         => 'La contraseña debe tener al menos 8 caracteres.',
            'password.confirmed'   => 'Las contraseñas no coinciden.',
        ];

        Validator::make($input, [
            'first_names' => ['required', 'string', 'max:255'],
            'email'       => ['required', 'string', 'email', 'max:255', Rule::unique(User::class, 'email')],
            'password'    => $this->passwordRules(),
        ], $messages)->validate();

        return User::create([
            'uuid'                   => Str::uuid(),
            'first_names'            => $input['first_names'],
            'last_names'             => $input['last_names'] ?? "",
            'email'                  => $input['email'],
            'password'               => Hash::make($input['password']),
            'username'               => $input['username'] ?? null,
            'photo'                  => $input['photo'] ?? null,
            'type_document_id'       => $input['type_document_id'] ?? null,
            'document'               => $input['document'] ?? null,
            'gender_id'              => $input['gender_id'] ?? 3003,
            'supervisor_id'          => $input['supervisor_id'] ?? null,
            'state_id'               => $input['state_id'] ?? 1002
        ]);
    }
}
