<?php

namespace Modules\Lab\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLabTestRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:lab_tests,name',
            'duration' => 'required|integer',
            'results' => 'nullable|string',
            'authenticated' => 'boolean',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The lab test name is required.',
            'name.string' => 'The lab test name must be a valid string.',
            'name.max' => 'The lab test name must not exceed 255 characters.',
            'name.unique' => 'The lab test name must be unique. This name is already in use.',
            
            'duration.required' => 'The duration of the lab test is required.',
            'duration.integer' => 'The duration must be an integer value.',

            'results.string' => 'The results must be a valid string.',

            'authenticated.boolean' => 'The authenticated field must be true or false.',
        ];
    }

}
