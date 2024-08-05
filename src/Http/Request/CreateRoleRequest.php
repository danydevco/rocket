<?php

namespace Danydevco\Rocket\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class CreateRoleRequest extends FormRequest {
    public function rules(): array {
        return [
            'name' => 'required|string|max:255|unique:roles,name',
            'display_name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
        ];
    }

    public function authorize(): bool {
        return true;
    }
}
