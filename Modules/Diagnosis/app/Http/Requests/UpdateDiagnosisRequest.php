<?php

namespace Modules\Diagnosis\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
// use Illuminate\Container\Attributes\Log;
use Illuminate\Support\Facades\Log;

class UpdateDiagnosisRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Adjust based on your authorization logic
    }

    public function rules(): array
    {
        // $diagnosisId = $this->route('diagnosis'); // Retrieve the ID from the route
        
        // Log::info('Diagnosis ID:', ['id' => $diagnosisId]);

        return [
            'name' => 'required|string|max:255',
            'icd11_code' => 'required|string|max:10|unique:diagnoses,icd11_code,' . $this->route('diagnosis')->id,
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The diagnosis name is required.',
            'icd11_code.required' => 'The ICD11 code is required.',
            'icd11_code.unique' => 'The ICD11 code has already been taken.',
        ];
    }
}

