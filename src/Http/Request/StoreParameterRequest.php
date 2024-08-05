<?php

namespace Danydev\Rocket\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class StoreParameterRequest extends FormRequest {
    public function rules(): array {
        return [
            'code' => 'required|numeric|unique:parameters,code',
            'name' => 'required|string',
            'description' => 'required|string',
        ];
    }

    public function authorize(): bool {
        return true;
    }
}
