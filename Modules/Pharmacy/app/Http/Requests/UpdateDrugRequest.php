<?php

namespace Modules\Pharmacy\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDrugRequest extends FormRequest
{
    public function authorize(): bool
    {
        // You can add any authorization logic here. 
        // Returning true allows all users to make this request.
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'brand_name' => 'required|string|max:255',
            'form' => 'required|string|max:255',
            'code' => 'required|string|max:100|unique:drugs,code,' . $this->route('drug')->id,
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The drug name is required.',
            'brand_name.required' => 'The brand name is required.',
            'form.required' => 'The drug form is required.',
            'code.required' => 'The drug code is required.',
            'code.unique' => 'The drug code must be unique.',
        ];
    }
}

