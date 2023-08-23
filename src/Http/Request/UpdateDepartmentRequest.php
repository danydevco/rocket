<?php

namespace DeveloperHouse\Rocket\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDepartmentRequest extends FormRequest {
    public function rules(): array {
        return [
            'name' => 'required|string|max:255',
            'state_id' => 'required|exists:parameters,code',
        ];
    }

    public function authorize(): bool {
        return true;
    }

}