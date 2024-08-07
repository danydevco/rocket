<?php

namespace Danydevco\Rocket\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class EditDepartmentRequest extends FormRequest {
    public function rules(): array {
        return [
            'name' => 'required|string',
            'department_id' => 'required|exists:departments,id',
            'state_id' => 'required|exists:parameters,code',
        ];
    }

    public function authorize(): bool {
        return true;
    }

}