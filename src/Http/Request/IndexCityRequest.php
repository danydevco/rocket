<?php

namespace Danydev\Rocket\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class IndexCityRequest extends FormRequest {
    public function rules(): array {
        return [
            'department' => 'required|exists:departments,id',
        ];
    }

    public function authorize(): bool {
        return true;
    }
}
