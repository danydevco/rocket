<?php

namespace Danydev\Rocket\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class UpdateParameterRequest extends FormRequest {
    public function rules(): array {

        $parameterId = $this->route('parameter'); // Obtén el ID del parámetro actual
        return [
            'code' => 'required|numeric|unique:parameters,code,' . $parameterId->id,
            'name' => 'required|string',
            'description' => 'required|string',
            'state' => 'required|numeric',
            'msg' => 'string',
        ];
    }

    public function authorize(): bool {
        return true;
    }
}
