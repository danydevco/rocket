<?php

namespace Danydevco\Rocket\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class CreatePermissionRequest extends FormRequest {
    public function rules(): array {
        return [
            'name' => 'required|string|unique:permissions,name',
            'description' => 'required|string',
        ];
    }

    public function authorize(): bool {
        return true;
    }
}
