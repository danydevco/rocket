<?php

namespace DeveloperHouse\Rocket\Http\Request;

use DeveloperHouse\Rocket\Utils\ApiResponseUtil;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class AuthRequest extends FormRequest {
    public function rules(): array {
        return [
            'email' => 'required|email',
            'password' => 'required',
        ];
    }

    public function authorize(): bool {
        return true;
    }

    protected function failedValidation(Validator $validator) {
        $data = ApiResponseUtil::errorResponse(trans('rocket::message.login.required'), 422);

        throw new HttpResponseException(
            response()->json($data, 422) // You can customize the status code here
        );
    }
}
