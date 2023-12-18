<?php

namespace DeveloperHouse\Rocket\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest {
    public function rules(): array {

        if (config('rocket.login.field') == 'email') {
            return [
                'token' => 'required',
                'email' => 'required|email',
                'password' => 'required|confirmed|min:8',
            ];
        } else {
            return [
                'token' => 'required',
                'username' => 'required',
                'password' => 'required|confirmed|min:8',
            ];
        }



    }

    public function authorize(): bool {
        return true;
    }
}
