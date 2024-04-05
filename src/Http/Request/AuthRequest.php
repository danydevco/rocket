<?php

namespace DeveloperHouse\Rocket\Http\Request;

use DeveloperHouse\Rocket\Utils\ApiResponseUtil;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class AuthRequest extends FormRequest {

    public function authorize(): bool {
        return true;
    }

    public function rules(): array {

        if (config('rocket.login.field') == 'email') {
            return [
                'email' => 'required|email',
                'password' => 'required',
            ];
        } else {
            return [
                'username' => 'required',
                'password' => 'required',
            ];
        }

    }

    public function messages(): array {
        return [
            'email.required' => 'El campo de correo electrónico es obligatorio.',
            'email.email' => 'Por favor ingrese un correo electrónico válido.',
            'password.required' => 'El campo de contraseña es obligatorio.',
            'username.required' => 'El campo de nombre de usuario es obligatorio.',
        ];
    }

    protected function failedValidation(Validator $validator) {
        if ($this->expectsJson()) {
            $data = ApiResponseUtil::error(trans('rocket::message.login.required'), 422);

            throw new HttpResponseException(
                response()->json($data, 422) // You can customize the status code here
            );
        }

        parent::failedValidation($validator);
    }
}
