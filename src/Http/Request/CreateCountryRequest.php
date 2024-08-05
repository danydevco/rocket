<?php

namespace Danydev\Rocket\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class CreateCountryRequest extends FormRequest {
    public function rules(): array {
        return [
            'name'         => 'required|string',
            'abbreviation' => 'required|string',
            'state_id'     => 'required|numeric|exists:parameters,code',
        ];
    }

    public function authorize(): bool {
        return true;
    }

}