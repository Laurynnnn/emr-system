<?php

namespace Modules\Diagnosis\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDiagnosisRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:100',
            'icd11_code' => 'required|string|max:10|unique:diagnoses,icd11_code',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The drug name is required.',
            'icd11_code.required' => 'The drug code is required.',
            'icd11_code.unique' => 'The drug code must be unique.',
        ];
    }
}
