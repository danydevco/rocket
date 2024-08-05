<?php

namespace Danydev\Rocket\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class IndexDepartmentRequest extends FormRequest {
    public function rules(): array {
        return [
            'country' => 'required|exists:countries,id',
        ];
    }

    public function authorize(): bool {
        return true;
    }
}
