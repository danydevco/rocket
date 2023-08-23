<?php

namespace DeveloperHouse\Rocket\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest {
    public function rules(): array {
        return [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ];
    }

    public function authorize(): bool {
        return true;
    }
}
