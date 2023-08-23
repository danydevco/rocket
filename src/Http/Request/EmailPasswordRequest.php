<?php

namespace DeveloperHouse\Rocket\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class EmailPasswordRequest extends FormRequest {
    public function rules(): array {
        return [
            'email' => 'required|email',
        ];
    }

    public function authorize(): bool {
        return true;
    }
}
