<?php

namespace Modules\Clinic\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;

class UpdateClinicRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $clinicId = $this->route('clinics');

        return [
            'name' => [
                'required',
                'string',
                'max:255',
                'unique:clinics,name,' . $clinicId,
            ],
        ];
    }



    public function messages(): array
    {
        return [
            'name.required' => 'The clinic name is required.',
            'name.unique' => 'A clinic with this name already exists.',
        ];
    }
}
