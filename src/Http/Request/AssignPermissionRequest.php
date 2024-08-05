<?php

namespace Danydev\Rocket\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class AssignPermissionRequest extends FormRequest {
    public function rules(): array {
        return [
            'permission' => 'required|numeric|exists:permissions,id',
            'role' => 'required|numeric|exists:roles,id'
        ];
    }

    public function authorize(): bool {
        return true;
    }
}
