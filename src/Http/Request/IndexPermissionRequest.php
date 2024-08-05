<?php

namespace Danydev\Rocket\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class IndexPermissionRequest extends FormRequest {
    public function rules(): array {
        return [
            'search' => 'nullable|string',
        ];
    }

    public function authorize(): bool {
        return true;
    }
}
