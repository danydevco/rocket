<?php

namespace DeveloperHouse\Rocket\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class EmailPasswordRequest extends FormRequest {
    public function rules(): array {
        if (config('rocket.login.field') == 'email') {
            return [
                'email' => 'required|email',
            ];
        } else {
            return [
                'username' => 'required',
            ];
        }
    }

    public function authorize(): bool {
        return true;
    }
}
