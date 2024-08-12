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
}
