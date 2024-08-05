<?php

namespace Danydev\Rocket\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class UpdateValueRequest extends FormRequest {
    public function rules(): array {
        return [
            'name' => 'required|string',
            'description' => 'required|string',
        ];
    }

    public function authorize(): bool {
        return true;
    }
}
