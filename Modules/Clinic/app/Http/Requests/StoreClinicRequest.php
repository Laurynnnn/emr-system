<?php

namespace Modules\Clinic\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClinicRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:50|unique:clinics,name',
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
