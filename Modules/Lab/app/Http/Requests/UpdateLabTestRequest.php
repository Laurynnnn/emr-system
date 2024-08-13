<?php

namespace Modules\Lab\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLabTestRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    // In UpdateLabTestRequest
    public function rules()
    {
        return [
            'name' => 'required|string|max:100|unique:lab_tests,name,' . $this->route('lab_test')->id,
            'duration' => 'required|integer',
            'results' => 'required|string|max:255',
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
