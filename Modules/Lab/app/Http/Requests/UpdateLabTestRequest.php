<?php

namespace Modules\Lab\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLabTestRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:lab_tests,name,' . $this->route('lab_test'),
            'duration' => 'required|integer',
            'results' => 'nullable|string',
            'authenticated' => 'boolean',
        ];
    }
}
