<?php

namespace Danydevco\Rocket\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class CreateDepartmentRequest extends FormRequest {
    public function rules(): array {
        return [
            'name' => 'required|string|max:255',
            'country_id' => 'required|exists:countries,id',
            'state_id' => 'required|exists:parameters,code',
        ];
    }

    public function authorize(): bool {
        return true;
    }
}
