<?php

namespace Modules\Patient\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'gender' => 'required|in:male,female',
            'date_of_birth' => 'required|date',
            'phone_number' => 'nullable|string|max:15',
            'next_of_kin_name' => 'required|string|max:100',
            'next_of_kin_relationship' => 'required|in:mother,father,daughter,son,brother,sister',
            'next_of_kin_phone_number' => 'required|string|max:15',
        ];
    }

    /**
     * Get the custom messages for validation errors.
     */
    public function messages(): array
    {
        return [
            'first_name.required' => 'The first name is required.',
            'first_name.string' => 'The first name must be a string.',
            'first_name.max' => 'The first name must not exceed 50 characters.',

            'last_name.required' => 'The last name is required.',
            'last_name.string' => 'The last name must be a string.',
            'last_name.max' => 'The last name must not exceed 50 characters.',

            'gender.required' => 'The gender is required.',
            'gender.in' => 'The gender must be either male or female.',

            'date_of_birth.required' => 'The date of birth is required.',
            'date_of_birth.date' => 'The date of birth must be a valid date.',

            'phone_number.string' => 'The phone number must be a string.',
            'phone_number.max' => 'The phone number must not exceed 15 characters.',

            'next_of_kin_name.required' => 'The next of kin name is required.',
            'next_of_kin_name.string' => 'The next of kin name must be a string.',
            'next_of_kin_name.max' => 'The next of kin name must not exceed 100 characters.',

            'next_of_kin_relationship.required' => 'The relationship with the next of kin is required.',
            'next_of_kin_relationship.in' => 'The relationship must be either mother, father, daughter, son, brother, or sister.',

            'next_of_kin_phone_number.required' => 'The next of kin phone number is required.',
            'next_of_kin_phone_number.string' => 'The next of kin phone number must be a string.',
            'next_of_kin_phone_number.max' => 'The next of kin phone number must not exceed 15 characters.',
        ];
    }
}
